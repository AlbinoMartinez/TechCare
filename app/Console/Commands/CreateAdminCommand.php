<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'techcare:create-admin 
                            {--email= : Email address of the admin} 
                            {--name= : Full name of the admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat akun administrator TechCare secara interaktif dan aman';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('==========================================');
        $this->info('   Pembuatan Akun Admin TechCare Panel    ');
        $this->info('==========================================');

        $name = $this->option('name') ?: $this->ask('Nama Lengkap Admin', 'Nur Muhibbin');
        $email = $this->option('email') ?: $this->ask('Email Login Admin');

        $validator = Validator::make(
            ['email' => $email, 'name' => $name],
            ['email' => 'required|email', 'name' => 'required|string|max:100']
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return self::FAILURE;
        }

        $password = $this->secret('Password (minimal 8 karakter)');
        if (!$password || strlen($password) < 8) {
            $this->error('Password harus minimal 8 karakter demi keamanan!');
            return self::FAILURE;
        }

        $passwordConfirmation = $this->secret('Ulangi Password');
        if ($password !== $passwordConfirmation) {
            $this->error('Konfirmasi password tidak cocok!');
            return self::FAILURE;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );

        $this->info("✓ Akun admin '{$user->name}' ({$user->email}) berhasil dibuat/diperbarui dengan aman.");
        return self::SUCCESS;
    }
}
