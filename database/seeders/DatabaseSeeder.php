<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'adminpawoncriwiel@gmail.com',
            'password' => bcrypt('adminPawonCriwiel321'),
            'is_admin' => 1,
        ]);

        // Menu::create([
        //     'title' => 'Nasi Goreng',
        //     'slug' => 'nasi-goreng',
        //     'desc' => 'harga mulai dari Rp.150.000',
        //     'body' => 'Nasi goreng adalah makanan yang terbuat dari nasi yang digoreng dan diaduk dalam minyak goreng atau margarin, biasanya ditambah kecap manis, bawang merah, bawang putih, merica, lada hitam, garam, cabai, daun bawang, irisan daging ayam, telur, dan sayuran. Nasi goreng adalah makanan yang populer di Indonesia dan Malaysia. Nasi goreng juga merupakan makanan nasional di Indonesia.',
        // ]);

        // Order::factory(10)->create();
    }
}
