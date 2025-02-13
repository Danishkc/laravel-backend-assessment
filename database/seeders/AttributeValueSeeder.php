<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttributeValue::insert([
            ['attribute_id' => 1, 'entity_id' => 1, 'value' => 'Engineering'],
            ['attribute_id' => 2, 'entity_id' => 2, 'value' => '2025-02-01'],
            ['attribute_id' => 3, 'entity_id' => 3, 'value' => '2025-06-30'],
            ['attribute_id' => 4, 'entity_id' => 4, 'value' => '50000'],
            ['attribute_id' => 5, 'entity_id' => 5, 'value' => 'High'],
        ]);
    }
}
