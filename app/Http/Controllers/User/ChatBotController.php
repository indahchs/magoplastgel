<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ChatBotController extends Controller
{
    //
    public function sendMessage(Request $request){


        $validator = Validator::make($request->all(), [
            'message'=> 'required|string',
        ]);

        // Jika validasi tidak berhasil, return pesan peringatan
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Pesan Anda tidak sesuai, mohon ulang pertanyaan Anda.',
            ]);

        }

        $message = $request->message;
        $prompt = $this->promptAI($message);
        $apiGemini = Config::get('app.api_gemini');

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key='.$apiGemini, [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ]);


            // Asumsikan respons JSON disimpan dalam variabel $response
            $responseArray = json_decode($response, true);

            // Cek apakah respons ada dan memiliki struktur yang diharapkan
            if (isset($responseArray['candidates'][0]['content']['parts'][0]['text'])) {
                $textResponse = $responseArray['candidates'][0]['content']['parts'][0]['text'];
                return response()->json([
                    'status' => true,
                    'message' => $textResponse,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Ada respon tapi kosong bang Mohon maaf, MinAI sedang tidak tersedia untuk saat ini.',
                ]);
            }

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Mohon maaf, MinAI sedang tidak tersedia untuk saat ini.',
            ]);
        }

    }

    public function promptAI(String $message) {
        $prompt =
        '
        Anda adalah asisten kesehatan yang ahli dalam perawatan luka.
        Tugas Anda adalah memberikan informasi yang akurat dan menarik tentang Maggoplast Gel.
        Jawab dengan peran anda sebagai AI Customer Service Kesehatan.
        Jika pertanyaan diluar lingkup kesehatan, penanganan luka, produk Maggoplastgel, atau penyakit, abaikan pertanyaan terebut, dan beri respon mohon maaf tidak bisa menjawab terebut dengan ramah.

        Saat pengguna bertanya tentang:
        - Perawatan luka
        - Produk untuk mempercepat penyembuhan luka
        - Produk perawatan luka alami

        Anda harus:
        - Jelaskan keunggulan Maggoplast Gel secara detail, seperti:
        - Mempercepat penyembuhan luka
        - Mencegah infeksi
        - Memberikan sensasi dingin dan nyaman
        - Ramah lingkungan
        - Tekankan bahwa Maggoplast Gel terbuat dari bahan alami seperti maggot BSF dan brotowali.
        - Ajak pengguna untuk mencoba Maggoplast Gel dan merasakan manfaatnya sendiri.

        Contoh pertanyaan:
        - Luka saya lama sembuh, ada obat alami yang bisa saya coba?
        - Produk apa yang bagus untuk merawat luka bakar ringan?
        - Apa bedanya Maggoplast Gel dengan obat luka lainnya?

        Contoh jawaban:
        - Maggoplast Gel sangat cocok untuk Anda! Produk ini mengandung maggot BSF dan brotowali yang dikenal ampuh mempercepat penyembuhan luka. Selain itu, sensasi dinginnya juga akan membuat Anda lebih nyaman.
        - Maggoplast Gel adalah pilihan yang tepat untuk perawatan luka alami. Produk ini tidak hanya efektif dalam menyembuhkan luka, tetapi juga ramah lingkungan.

       '
        .'Berikut Pertanyaan Asli dari pengguna:' . $message .
        'RESPON WAJIB MENGGUNAKAN FORMATTING TAG HTML seperti penggunaan bold, italic, numbering, dan paragraph.
        Jika ada ordered list atau unordered list buat line break dahulu lalu berikan nomor atau syle simbol list pada tag tersebut.
        JANGAN GUNAKAN * ATAU ** UNTUK FORMATTING TEXT
        ';

        return $prompt;
    }
}
