<?php

namespace Database\Seeders;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Muhammad Asyrofuddien',
            'username' => 'asyrofuddien',
            'is_admin' => 1,
            'password' => bcrypt('12345')
        ]);
        User::create([
            'nama' => 'Toko Tiga Putra',
            'username' => 'toko',
            'is_admin' => 1,
            'password' => bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'Irene Belinda',
        //     'email' => 'irenebelinda2001@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Kategori::create([
            'nama' => 'Meja',
            'slug' => 'meja'
        ]);
        Kategori::create([
            'nama' => 'chair',
            'slug' => 'chair'
        ]);
        Kategori::create([
            'nama' => 'Door',
            'slug' => 'door'
        ]);
        Kategori::create([
            'nama' => 'Sofa',
            'slug' => 'sofa'
        ]);

        Katalog::factory(30)->create();
    }
}
