<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Menampilkan halaman chatbot
     */
    public function index()
{
    $userType = auth()->guard('siswa')->check() ? 'siswa' : 'guru';
    return view("{$userType}.chatbot"); // Akan mengembalikan view siswa/chatbot.blade.php atau guru/chatbot.blade.php
}
    /**
     * Menangani request chat dari user
     */
    public function handle(Request $request)
    {
        try {
            $validated = $request->validate([
                'message' => 'required|string|max:500',
                'history' => 'sometimes|array'
            ]);

            $message = $validated['message'];
            $history = $validated['history'] ?? [];

            // Dapatkan response dari AI
            $response = $this->getAIResponse($message, $history);

            // Update history (maksimal 10 pesan terakhir)
            $newHistory = array_slice(array_merge($history, [
                ['role' => 'user', 'content' => $message],
                ['role' => 'assistant', 'content' => $response]
            ]), -10);

            return response()->json([
                'response' => $response,
                'history' => $newHistory
            ]);

        } catch (\Exception $e) {
            Log::error('Chatbot error: ' . $e->getMessage());
            return response()->json([
                'response' => 'Maaf, sedang ada gangguan teknis. Silakan coba lagi nanti.',
                'history' => $history ?? []
            ], 500);
        }
    }

    /**
     * Mendapatkan response dari AI service
     */
    private function getAIResponse(string $message, array $history): string
    {
        // Implementasi 1: Menggunakan OpenAI API
        if (env('OPENAI_API_KEY')) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json'
                ])->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => array_merge(
                        [['role' => 'system', 'content' => 'Anda adalah asisten ahli sejarah Indonesia.']],
                        $this->formatHistory($history),
                        [['role' => 'user', 'content' => $message]]
                    ),
                    'temperature' => 0.7,
                    'max_tokens' => 500
                ]);

                if ($response->successful()) {
                    return $response->json()['choices'][0]['message']['content'];
                }
            } catch (\Exception $e) {
                Log::error('OpenAI API error: ' . $e->getMessage());
            }
        }

        // Implementasi 2: Fallback lokal
        return $this->getLocalResponse($message);
    }

    /**
     * Format history untuk model AI
     */
    private function formatHistory(array $history): array
    {
        return array_map(function($item) {
            return [
                'role' => $item['role'] === 'user' ? 'user' : 'assistant',
                'content' => $item['content'] ?? ''
            ];
        }, $history);
    }

    /**
     * Response lokal ketika API tidak tersedia
     */
    private function getLocalResponse(string $message): string
    {
        $responses = [
            'sejarah' => 'Sejarah adalah studi tentang masa lalu, khususnya bagaimana kaitannya dengan manusia.',
            'indonesia' => 'Sejarah Indonesia mencakup periode yang sangat panjang dimulai dari zaman prasejarah.',
            'majapahit' => 'Majapahit adalah kerajaan besar di Nusantara yang berpusat di Jawa Timur (1293-1527).',
            'penjajahan' => 'Masa penjajahan di Indonesia meliputi Portugis, Belanda, Inggris, dan Jepang.',
            'proklamasi' => 'Proklamasi Kemerdekaan Indonesia dibacakan oleh Soekarno-Hatta pada 17 Agustus 1945.',
            'default' => 'Saya adalah asisten pembelajaran sejarah. Saya bisa membantu menjawab pertanyaan seputar sejarah Indonesia dan dunia.'
        ];

        foreach ($responses as $keyword => $answer) {
            if (stripos($message, $keyword) !== false) {
                return $answer;
            }
        }

        return $responses['default'];
    }
}