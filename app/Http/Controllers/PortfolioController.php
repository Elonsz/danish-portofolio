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
        } catch (QueryException $exception) {
            report($exception);
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

        // Simpan ke log atau session flash message
        return back()->with('success', 'Terima kasih, pesan Anda telah berhasil dikirim! Saya akan segera merespons.');
    }
}
