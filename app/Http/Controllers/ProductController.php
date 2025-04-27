<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 *  Class ProductController

 *  Controller untuk menangani semua operasi terkait dengan produk
 */
class ProductController extends Controller
{
    /**
     * Menampilkan halaman tambah produk
     * 
     * @return \Illuminate\View\View
     */
    public function createIndex() {
        // Mengambalikan view form tambah produk
        return view('pages.admin.product.product-create-update', [
            'type_menu' => 'product',
        ]);
    }

    /**
     * Menyimpan produk baru ke dalam database
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        // Cek apakah produk sudah ada atau belum
        $product_exists = Product::count();

        if ($product_exists) {
            // Kembali jiak produk sudah ada
            return redirect('/produk/daftar-produk')->with('fail', 'Hanya boleh menambahkan 1 produk saja!');
        }

        // Validasi input produk
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer|min:1',
            'weight' => 'required|integer|min:1',
            'length' => 'nullable|integer|min:1',
            'width' => 'nullable|integer|min:1',
            'height' => 'nullable|integer|min:1',
            'stock' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        // Membuat slug berdasarkan nama produk
        $slug = Str::slug($data['name']);

        // Validasi jika slug sudah digunakan atau tidak
        if (Product::where('slug', $slug)->count()) {
            // Jika slug sudah terdaftar tambahkan strin "-2"
            $slug .= '-2';
        }

        // Simpan slug
        $data['slug'] = $slug;

        // Menghapus 'images' dari array data yang akan disimpan
        $data = collect($data)->except('images')->toArray();

        // Simpan produk baru ke dalam database
        $product = Product::create($data);

        // Validasi jika terdapat gambar produk
        if ($request->hasFile('images')) {
            // Looping semua gambar produk
            foreach ($request->file('images') as $image) {
                // Simpan gambar ke dalam storage
                $path = $image->store('product', 'public');

                // Simpan path gambar ke dalam database
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path
                ]);
            }
        }

        // Flash tost
        $request->session()->flash('success', 'Berhasil menambahkan produk!');

        // Redirect ke halaman daftar produk
        return redirect()->intended('/produk/daftar-produk');
    }

    /**
     * Menampilkan semua daftar produk
     * 
     * @return \Illuminate\View\View
     */
    public function list() {
        // Mengambil semua produk dengan relasi gambar produk
        $products = Product::with('productImages')->filter(request(['search']))->get();

        // Mengembalikan view daftar produk dengan data produk
        return view('pages.admin.product.product-list', [
            'type_menu' => 'product',
            'products' => $products
        ]);
    }

    /**
     * Menonaktifkan produk
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate(Product $product, Request $request) {
        // Validasi jika produk aktif
        if ($product->status) {
            // Update status produk menjadi tidak aktif
            $product->update([
                'status' => false
            ]);
        }

        // Flash toast success
        $request->session()->flash('success', 'Berhasil merubah status produk');

        // Redirect ke halaman daftar produk
        return redirect()->intended('/produk/daftar-produk');
    }

    /**
     * Mengaktifkan produk
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function activate(Product $product, Request $request) {
        // Validasi jika produk tidak aktif
        if (!$product->status) {
            // Update status produk menjadi aktif
            $product->update([
                'status' => true
            ]);
        }
        // Flash toast success
        $request->session()->flash('success', 'Berhasil merubah status produk');

        // Redirect ke halaman daftar produk
        return redirect()->intended('/produk/daftar-produk');
    }

    /**
     * Menampilkan form update produk
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\View\View
     */
    public function updateIndex(Product $product) {
        // Mengembalikan view form update produk dengan data produk
        return view('pages.admin.product.product-create-update', [
            'type_menu' => 'product',
            'product' => $product
        ]);
    }

    /**
     * Mengupdate produk
     * 
     * @param \App\Models\Product $product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, Request $request) {
        // Validasi input produk
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'length' => 'nullable|integer',
            'width' => 'nullable|integer',
            'height' => 'nullable|integer',
            'stock' => 'required|integer',
            'status' => 'boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10000',
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10000',
        ]);

        // Validasi jika terdapat gambar yang dihapus
        if ($request->has('delete_images')) {
            // Looping semua gambar yang dihapus
            foreach ($request->delete_images as $imageId) {
                // Mengambil gambar produk
                $image = ProductImage::findOrFail($imageId);

                // Menghapus gambar produk dari penyimpanan
                Storage::disk('public')->delete($image->path);

                // Menghapus gambar produk dari database
                $image->delete();
            }
        }

        // Validasi jika terdapat gambar yang pdiubah
        if ($request->has('images')) {
            // Looping setiap gambar yang diubah
            foreach ($request->images as $imageId => $file) {
                // Validasi jika file gambar ada
                if ($file) {
                    // Mengambil gambar produk dari database
                    $image = ProductImage::findOrFail($imageId);
                    
                    // Hapus gambar lama dari storage
                    Storage::disk('public')->delete($image->path);
                    
                    // Simpan gambar baru
                    $path = $file->store('product', 'public');
                    
                    // Update path di database
                    $image->update(['path' => $path]);
                }
            }
        }

        // Menghapus 'images' dan 'new_images' dari array data yang akan disimpan
        $data = collect($data)->except(['images', 'new_images'])->toArray();

        // Update data produk pada database
        $product->update($data);

        // Validasi jika terdapat gambar produk baru
        if ($request->hasFile('new_images')) {
            // Looping setiap gambar produk baru
            foreach ($request->file('new_images') as $image) {
                // Simpan gambar produk baru ke dalam storage
                $path = $image->store('product', 'public');

                // Simpan path gambar produk baru ke dalam database
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path
                ]);
            }
        }

        // Flash toast success
        $request->session()->flash('success', 'Berhasil merubah data produk');

        // Redirect ke halaman daftar produk
        return redirect()->intended('/produk/daftar-produk');
    }

    /**
     * Menghapus produk soft delete
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Product $product, Request $request) {
        // Soft delete produk
        $product->delete();

        // Flash toast success
        $request->session()->flash('success', 'Berhasil menghapus produk');

        // Redirect ke halaman daftar produk
        return redirect()->intended('/produk/daftar-produk');
    }
}
