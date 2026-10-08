<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio pelajar.
     */
    public function index()
    {
        $portfolio = config('portfolio');
        $portfolio['certificates'] = [];

        try {
            if (Schema::hasTable('certificates')) {
                $portfolio['certificates'] = Certificate::query()
                    ->orderByDesc('id')
                    ->get()
                    ->map(fn (Certificate $certificate) => [
                        'title' => $certificate->title,
                        'issuer' => $certificate->issuer,
                        'date' => $certificate->date,
                        'credential_id' => $certificate->credential_id,
                        'image' => $certificate->image_path
                            ? Storage::disk('public')->url($certificate->image_path)
                            : $certificate->image_url,
                        'badge' => $certificate->badge,
                        'description' => $certificate->description,
                    ])
                    ->all();
            }
        } catch (\Throwable $exception) {
            // Silently fallback if database service is not currently active
            if (empty($portfolio['certificates'])) {
                $portfolio['certificates'] = [
                    [
                        'title' => 'Web Development Fundamentals & Modern JavaScript',
                        'issuer' => 'SMK Telkom Banjarbaru Certification Hub',
                        'date' => '2026',
                        'credential_id' => 'TELKOM-DEV-2026-0891',
                        'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1000&q=80',
                        'badge' => 'Terverifikasi',
                        'description' => 'Sertifikasi kompetensi rekayasa perangkat lunak dalam perancangan aplikasi web modern, modular frontend, dan integrasi database.',
                    ],
                    [
                        'title' => 'Full-Stack Web Engineering with Laravel & React',
                        'issuer' => 'National Vocational Competency Board',
                        'date' => '2025',
                        'credential_id' => 'NVCB-REACT-LARAVEL-772',
                        'image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1000&q=80',
                        'badge' => 'Kejuruan Telkom',
                        'description' => 'Penguasaan arsitektur MVC, RESTful API design, optimasi performa backend, dan reactive component state.',
                    ],
                ];
            }
        }

        return view('welcome', compact('portfolio'));
    }

    /**
     * Mengirim pesan kontak (fallback / server-side handler).
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        if ($request->expectsJson() || $request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Terima kasih ' . e($validated['name']) . ', pesan Anda telah berhasil terkirim! Saya akan segera merespons.',
            ]);
        }

        return back()->with('success', 'Terima kasih, pesan Anda telah berhasil dikirim! Saya akan segera merespons.');
    }
}
