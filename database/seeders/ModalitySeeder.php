<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $xray = Modality::create([
        'name' => 'X-Ray',
        'code' => 'XR',
        'description' => 'Standard X-Ray imaging',
        ]);

    $xray->examinations()->createMany([
        [
            'name' => 'X-Ray Chest PA',
            'code' => 'XR-CHST-PA',
            'description' => 'Chest Posterior-Anterior View',
            'default_duration' => 15,
        ],
        [
            'name' => 'X-Ray Abdomen',
            'code' => 'XR-ABD',
            'description' => 'Abdominal imaging',
            'default_duration' => 20,
        ],
            ]);
        }
    
}

