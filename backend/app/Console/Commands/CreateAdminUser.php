<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin {--email=} {--name=} {--organisation=enterprise IT}';

    protected $description = 'Interactively create (or promote) an admin account. Safe to run in production via Render\'s Shell tab.';

    public function handle(): int
    {
        $email = $this->option('email') ?: $this->ask('Admin email address');
        $name = $this->option('name') ?: $this->ask('Admin full name');
        $organisation = $this->option('organisation');

        $validator = Validator::make(compact('email', 'name'), [
            'email' => 'required|email',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $this->error(implode(' ', $validator->errors()->all()));
            return self::FAILURE;
        }

        $password = $this->secret('Admin password (input hidden, min 12 characters)');
        $confirm = $this->secret('Confirm password');

        if ($password !== $confirm) {
            $this->error('Passwords did not match.');
            return self::FAILURE;
        }

        if (strlen($password) < 12) {
            $this->error('Password must be at least 12 characters.');
            return self::FAILURE;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'organisation' => $organisation,
                'account_type' => 'admin',
                'password' => Hash::make($password),
            ]
        );

        $this->info("Admin account ready for {$user->email}.");
        return self::SUCCESS;
    }
}
