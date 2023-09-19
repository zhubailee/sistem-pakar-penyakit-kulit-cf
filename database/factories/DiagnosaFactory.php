<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diagnosa>
 */
class DiagnosaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'      =>  fake()->name(),
            'tanggal'   =>  fake()->date(),
            'penyakit'  =>  fake()->text(),
            'gejala'    =>  fake()->text(),
            'idpenyakit'=>  fake()->randomNumber(),
            'nilai'     =>  0.0
        ];
    }
}
