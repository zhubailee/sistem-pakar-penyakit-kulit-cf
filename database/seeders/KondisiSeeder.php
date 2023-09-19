<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kondisi = [
            'Pasti ya',
            'Hampir pasti ya',
            'Kemungkinan besar ya',
            'Mungkin ya',
            'Tidak tahu',
            'Mungkin tidak',
            'Kemungkinan besar tidak',
            'Hampir pasti tidak',
            'Pasti tidak'
        ];
        foreach ($kondisi as $k) {
            Kondisi::factory()->create([
                'kondisi'   =>  $k
            ]);
        }
    }
}
