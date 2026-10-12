<?php

namespace App\\Http\\Controllers;

use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = config('portfolio');
        $portfolio['certificates'] = self::readCertificates();

        return view('welcome', compact('portfolio'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        $message = 'Terima kasih ' . $validated['name'] . ', formulir berhasil divalidasi. Konfigurasi layanan email diperlukan untuk mengirim pesan ke inbox.';

        if ($request->expectsJson() || $request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => $message]);
        }

        return back()->with('success', $message);
    }

    public static function readCertificates(): array
    {
        $path = 'portfolio-certificates.json';
        if (! Storage::disk('local')->exists($path)) {
            return config('portfolio.certificates', []);
        }

        $items = json_decode(Storage::disk('local')->get($path), true);
        return is_array($items) ? $items : config('portfolio.certificates', []);
    }

    public static function writeCertificates(array $certificates): void
    {
        Storage::disk('local')->put($path = 'portfolio-certificates.json',
            json_encode(array_values($certificates), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
    }
}
