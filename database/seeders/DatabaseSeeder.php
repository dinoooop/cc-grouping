<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('welcome'),
        ]);

        $countries = getCountries();
        foreach ($countries->data as $key => $country) {
            DB::table('countries')->insert([
                'name' => $country->name,
                'currency' => $country->currency,
            ]);
        }

        $cities = getCities();
        $count = 0;
        foreach ($cities->data as $key => $city) {
            
            DB::table('cities')->insert([
                'name' => $city->city,
                'population' => round(end($city->populationCounts)->value)
            ]);

            $count++;
            
            if ($count >= 100) {
                break;
            }
        }
    }
}
