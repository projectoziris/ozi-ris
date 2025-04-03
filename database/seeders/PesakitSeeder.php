<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesakit;
use Illuminate\Support\Str;

class PesakitSeeder extends Seeder
{
    public function run(): void
    {
        Pesakit::factory()->count(30)->create();
    }
}
