<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class EnkripsiPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:enkripsi-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enkripsi semua password pengguna yang belum dienkripsi.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Memulai proses enkripsi password...");

        // Iterate over each user
        foreach (User::all() as $user) {
            // Check if the password is not already encrypted (for example, if it's less than 60 characters)
            if (strlen($user->password) < 60) {
                // Encrypt the password and save it back
                $user->password = Hash::make($user->password);
                $user->save();

                $this->info("Password untuk user {$user->email} telah dienkripsi.");
            }
        }

        $this->info("Proses enkripsi selesai.");
    }
}
