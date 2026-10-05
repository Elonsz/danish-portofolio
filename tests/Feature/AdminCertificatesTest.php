<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCertificatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_the_dashboard(): void
    {
        $this->get(route('admin.certificates.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_non_admin_users_cannot_open_the_dashboard(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('admin.certificates.index'))
            ->assertForbidden();
    }

    public function test_only_admin_accounts_can_log_in(): void
    {
        $user = User::factory()->create();

        $this->post(route('admin.login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_admin_can_sign_in_and_view_the_dashboard(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['is_admin' => true])->save();

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.certificates.index'));

        $this->get(route('admin.certificates.index'))
            ->assertOk()
            ->assertSee('Tambah sertifikat');
    }

    public function test_admin_can_add_and_publish_a_certificate(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin)
            ->post(route('admin.certificates.store'), [
                'title' => 'Laravel Web Development',
                'issuer' => 'Dicoding',
                'date' => 'Oktober 2026',
                'credential_id' => 'CERT-2026-001',
                'image_url' => 'https://example.com/certificate.jpg',
                'badge' => 'Terverifikasi',
                'description' => 'Sertifikat pengembangan aplikasi Laravel.',
            ])
            ->assertRedirect(route('admin.certificates.index'));

        $this->assertDatabaseHas('certificates', [
            'credential_id' => 'CERT-2026-001',
            'title' => 'Laravel Web Development',
        ]);

        $this->get(route('portfolio.home'))
            ->assertOk()
            ->assertSee('Laravel Web Development');
    }

    public function test_admin_can_edit_and_delete_a_certificate(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['is_admin' => true])->save();
        $certificate = Certificate::create([
            'title' => 'Sertifikat Lama',
            'issuer' => 'Penerbit',
            'date' => 'September 2026',
            'credential_id' => 'CERT-OLD',
            'badge' => 'Selesai',
            'description' => 'Deskripsi sertifikat.',
        ]);

        $this->actingAs($admin)
            ->put(route('admin.certificates.update', $certificate), [
                'title' => 'Sertifikat Baru',
                'issuer' => 'Penerbit Baru',
                'date' => 'Oktober 2026',
                'credential_id' => 'CERT-NEW',
                'badge' => 'Terverifikasi',
                'description' => 'Deskripsi yang diperbarui.',
            ])
            ->assertRedirect(route('admin.certificates.index'));

        $this->assertDatabaseHas('certificates', ['title' => 'Sertifikat Baru']);

        $this->delete(route('admin.certificates.destroy', $certificate))
            ->assertRedirect(route('admin.certificates.index'));

        $this->assertDatabaseMissing('certificates', ['id' => $certificate->id]);
    }

    public function test_admin_can_upload_a_certificate_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin)
            ->post(route('admin.certificates.store'), [
                'title' => 'Sertifikat dengan gambar',
                'issuer' => 'Penerbit',
                'date' => 'Oktober 2026',
                'badge' => 'Terverifikasi',
                'description' => 'Deskripsi sertifikat.',
                'image' => UploadedFile::fake()->createWithContent(
                    'certificate.png',
                    base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jf4kAAAAASUVORK5CYII='),
                ),
            ])
            ->assertRedirect(route('admin.certificates.index'));

        $certificate = Certificate::query()->firstOrFail();

        $this->assertNotNull($certificate->image_path);
        Storage::disk('public')->assertExists($certificate->image_path);
    }

    public function test_public_portfolio_shows_an_empty_state_before_database_setup(): void
    {
        Schema::shouldReceive('hasTable')
            ->once()
            ->with('certificates')
            ->andReturnFalse();

        $this->get(route('portfolio.home'))
            ->assertOk()
            ->assertSee('Belum ada sertifikat yang ditambahkan.')
            ->assertSee(route('admin.login'));
    }
}
