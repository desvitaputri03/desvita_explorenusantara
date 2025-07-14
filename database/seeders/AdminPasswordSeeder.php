<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        
        if ($admin) {
            $admin->email = 'desvitaputri65@gmail.com';
            $admin->password = Hash::make('Vita1112');
            $admin->save();
            
            $this->command->info('Email dan password admin berhasil diupdate!');
            $this->command->info('Email: desvitaputri65@gmail.com');
            $this->command->info('Password: Vita1112');
        } else {
            $this->command->error('User admin tidak ditemukan!');
        }
    }
}
