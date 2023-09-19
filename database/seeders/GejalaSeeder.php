<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejala = [
            "Gatal Parah",
            "Ruam merah, kering, dan bersisik",
            'Kulit kering dan pecah-pecah',
            'Pembengkakan kulit',
            'Potensi untuk infeksi kulit sekunder',
            'Timbulnya komedo',
            'Munculnya bentolan merah dan bernanah',
            'Peradanan merah diarea tertentu',
            'Adanya bekas luka atau noda diwajah',
            'Mungkin disertai dengan rasa sakirt atau gatal',
            'Munculnya plak berwarna merah atau perak di kulit',
            'Kulit terkelupas',
            'Gatal atau rasa terbakar di area yang terkena',
            'Kuku yang meneal atau bergerigi',
            'Pertumbuhan kulit yang kasar dan berlekuk',
            'Terutama terjadi ditangan, kaki, atau area genital',
            'Ruam kulit yang sangat gatal dan nyeri',
            'Lebih umum disatu sisi tubuh dan mengikuti jalur saraf',
            'Blister berisi cairan',
            'Sensitivitas diarea yang terkena',
            'Demam dan gejala flu'
        ];
        foreach ($gejala as $g) {
            Gejala::factory()->create([
                'namagejala'    =>  $g
            ]);
        }
    }
}
