<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('app/json/xa_phuong.json'));
        $data = json_decode($json, true);
        foreach ($data as $item) {
            Commune::create([
                'id' => $item['code'],
                'name' => $item['name'],
                'district_id' => $item['parent_code'],
            ]);
        }
    }
}
