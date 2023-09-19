<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasisPengetahuan>
 */
class BasisPengetahuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idpenyakit'  =>  fake()->text(),
            'idgejala'    =>  fake()->text(),
            'mb'            =>  fake()->randomFloat($min=0, $max=1),
            'md'            =>  fake()->randomFloat($min=0, $max=1)
        ];
    }
}
