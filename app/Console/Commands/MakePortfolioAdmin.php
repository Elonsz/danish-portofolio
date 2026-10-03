<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakePortfolioAdmin extends Command
{
    protected $signature = 'portfolio:make-admin {name?} {email?}';

    protected $description = 'Create or update the private portfolio dashboard account';

    public function handle(): int
    {
        $name = $this->argument('name') ?: $this->ask('Nama admin');
        $email = $this->argument('email') ?: $this->ask('Email admin');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->components->error('Format email tidak valid.');

            return self::FAILURE;
        }

        do {
            $password = $this->secret('Password admin (minimal 12 karakter)');
            $confirmedPassword = $this->secret('Ulangi password admin');

            if (strlen((string) $password) < 12 || ! hash_equals((string) $password, (string) $confirmedPassword)) {
                $this->components->error('Password harus minimal 12 karakter dan kedua input harus sama.');
            }
        } while (strlen((string) $password) < 12 || ! hash_equals((string) $password, (string) $confirmedPassword));

        $admin = User::firstOrNew(['email' => $email]);
        $admin->forceFill([
            'name' => $name,
            'password' => Hash::make($password),
            'is_admin' => true,
        ])->save();

        $this->components->info("Dashboard admin siap untuk {$email}.");

        return self::SUCCESS;
    }
}
