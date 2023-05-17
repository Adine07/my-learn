<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Ntahini;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NtahiniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citys = City::all();
        foreach ($citys as $key => $value) {
            for ($i=0; $i < 10000; $i++) {
                Ntahini::create([
                    'name' => 'sujono',
                    'email' => 'sujono',
                    'city_id' => $i,
                    'company_id' => $key,
                ]);
            }
        }
    }
}
