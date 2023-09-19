<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penyakit = [
            'Demartitis Atopik',
            'Jerawat',
            'Psoriasis',
            'Kutil',
            'Cacar Air'
        ];
        foreach ($penyakit as $p) {
            Penyakit::factory()->create([
                'namapenyakit'  =>  $p,
                'detailpenyakit'=>  '-',
                'solusi'        =>  '-'
            ]);
        }
    }
}
