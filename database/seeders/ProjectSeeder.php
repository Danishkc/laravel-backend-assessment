<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::insert([
            ['name' => 'Project A', 'status' => 'active'],
            ['name' => 'Project B', 'status' => 'inactive'],
            ['name' => 'Project C', 'status' => 'active'],
            ['name' => 'Project D', 'status' => 'pending'],
            ['name' => 'Project E', 'status' => 'completed'],
        ]);
    }
}
