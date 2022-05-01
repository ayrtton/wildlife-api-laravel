<?php

namespace Database\Seeders;

use App\Models\AnimalClass;
use Illuminate\Database\Seeder;

class AnimalClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $animalClasses = [
            [
                'id'    => 1,
                'title' => 'Amphibians',
            ],
            [
                'id'    => 2,
                'title' => 'Birds',
            ],
            [
                'id'    => 3,
                'title' => 'Fish',
            ],
            [
                'id'    => 4,
                'title' => 'Invertebrates',
            ],
            [
                'id'    => 5,
                'title' => 'Mammals',
            ],
            [
                'id'    => 6,
                'title' => 'Reptiles',
            ],
        ];

        AnimalClass::insert($animalClasses);
    }
}
