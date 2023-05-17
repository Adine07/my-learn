<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Ntahitu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NtahituSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citys = City::all();
        foreach ($citys as $key => $value) {
            for ($i=0; $i < 10000; $i++) {
                Ntahitu::create([
                    'name' => 'sujono',
                    'email' => 'sujono',
                    'city_id' => $i,
                    'company_id' => $key,
                ]);
            }
        }
    }
}
