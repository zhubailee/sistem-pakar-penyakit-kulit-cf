<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name'  =>  'zhuzhu',
            'alamat'=>  'Lhokseumawe',
            'tgllahir'=>    '2000-05-02',
            'role'  =>  'admin',
            'email' =>  'zhuzhu@gmail.com',
            'password'=>    bcrypt('zhuzhu25')
        ]);
    }
}
