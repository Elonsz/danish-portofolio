<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CertificateController extends Controller
{
    public function index(Request $request): View
    {
        $certificates = Certificate::query()->orderByDesc('id')->paginate(10);
        $editingCertificate = $request->filled('edit')
            ? Certificate::findOrFail($request->integer('edit'))
            : null;

        return view('admin.certificates.index', compact('certificates', 'editingCertificate'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $this->storeImage($request, $validated);

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('status', 'Sertifikat berhasil ditambahkan.');
    }

    public function update(Request $request, Certificate $certificate): RedirectResponse
    {
        $validated = $request->validate($this->rules($certificate));
        $this->storeImage($request, $validated, $certificate);

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('status', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate): RedirectResponse
    {
        if ($certificate->image_path) {
            Storage::disk('public')->delete($certificate->image_path);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('status', 'Sertifikat berhasil dihapus.');
    }

    private function rules(?Certificate $certificate = null): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'issuer' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:100'],
            'credential_id' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('certificates', 'credential_id')->ignore($certificate),
            ],
            'image_url' => ['nullable', 'url', 'max:2048'],
            'image' => ['nullable', 'image', 'max:5120'],
            'badge' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
        ];
    }

    private function storeImage(Request $request, array &$validated, ?Certificate $certificate = null): void
    {
        if (! $request->hasFile('image')) {
            if ($request->filled('image_url') && $certificate?->image_path) {
                Storage::disk('public')->delete($certificate->image_path);
                $validated['image_path'] = null;
            }

            return;
        }

        if ($certificate?->image_path) {
            Storage::disk('public')->delete($certificate->image_path);
        }

        $validated['image_path'] = $request->file('image')->store('certificates', 'public');
        $validated['image_url'] = null;
        unset($validated['image']);
    }
}
