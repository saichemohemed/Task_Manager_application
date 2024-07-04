<?php

namespace Database\Seeders;

use App\Models\Priorities;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Priorities::create(['name' => 'Low','color' => 'info']);
        Priorities::create(['name' => 'Medium','color' => 'warning']);
        Priorities::create(['name' => 'Important','color' => 'danger']);

    }
}
