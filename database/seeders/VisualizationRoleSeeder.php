<?php

namespace Database\Seeders;

use App\Models\VisualizationRole;
use Illuminate\Database\Seeder;

class VisualizationRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisualizationRole::create([
            "name" => "private",
        ]);
        VisualizationRole::create([
            "name" => "public",
        ]);
        VisualizationRole::create([
            "name" => "general-public",
        ]);
    }
}
