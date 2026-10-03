<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('portfolio.certificates', []) as $certificate) {
            Certificate::updateOrCreate(
                ['credential_id' => $certificate['id_credential']],
                [
                    'title' => $certificate['title'],
                    'issuer' => $certificate['issuer'],
                    'date' => $certificate['date'],
                    'image_url' => $certificate['image'] ?? null,
                    'badge' => $certificate['badge'],
                    'description' => $certificate['description'],
                ],
            );
        }
    }
}
