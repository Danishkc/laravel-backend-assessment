<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timesheet;
use App\Models\User;
use App\Models\Project;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timesheet::insert([
            ['task_name' => 'Task 1', 'date' => now(), 'hours' => 5, 'project_id' => 1, 'user_id' => 1],
            ['task_name' => 'Task 2', 'date' => now(), 'hours' => 3, 'project_id' => 2, 'user_id' => 2],
            ['task_name' => 'Task 3', 'date' => now(), 'hours' => 7, 'project_id' => 3, 'user_id' => 3],
            ['task_name' => 'Task 4', 'date' => now(), 'hours' => 4, 'project_id' => 4, 'user_id' => 4],
            ['task_name' => 'Task 5', 'date' => now(), 'hours' => 6, 'project_id' => 5, 'user_id' => 5],
        ]);
    }
}
