<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AssetType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Azizi Yaacob',
//             'email' => 'azizi_yaacob@gmail.com',
//         ]);

         $this->call($this->seedAssetTypes());
    }

    private function seedAssetTypes()
    {
        AssetType::create([
            'type_name' => "Furniture"
        ]);

        AssetType::create([
            'type_name' => "ICT Equipment"
        ]);

        AssetType::create([
            'type_name' => "Laboratory Equipment"
        ]);

        AssetType::create([
            'type_name' => "Reading Material"
        ]);

        AssetType::create([
            'type_name' => "Electrical Equipment"
        ]);
    }
}
