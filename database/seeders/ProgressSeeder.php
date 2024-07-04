<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Progress::create(['name' => 'Not Started','color' => 'warning']);
        Progress::create(['name' => 'In Progress','color' => 'info']);
        Progress::create(['name' => 'Done','color' => 'success']);

    }
}
