// Fungsi untuk memformat angka menjadi format Rupiah
function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0,  maximumFractionDigits: 0, }).format(angka);
}

// Ambil semua elemen dengan class 'rupiah'
const elements = document.querySelectorAll('.rupiah');

// Iterasi setiap elemen dan ubah isinya menjadi format Rupiah
elements.forEach(function(element) {
    const angka = parseFloat(element.textContent); // Ambil angka dari teks
    if (!isNaN(angka)) {
        element.textContent = formatRupiah(angka); // Ubah menjadi format Rupiah
    }
});
  