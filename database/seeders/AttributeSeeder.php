<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::insert([
            ['name' => 'Department', 'type' => 'text'],
            ['name' => 'Start Date', 'type' => 'date'],
            ['name' => 'End Date', 'type' => 'date'],
            ['name' => 'Budget', 'type' => 'number'],
            ['name' => 'Priority', 'type' => 'select'],
        ]);
    }
}
