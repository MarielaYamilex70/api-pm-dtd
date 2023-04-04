<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Language;
use App\Models\Promotion;
use App\Models\Province;
use App\Models\Region;
use App\Models\School;
use App\Models\Stack;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $stacks = [
            ['name' => 'PHP'],
            ['name' => 'JAVA']
            
        ];
        foreach ($stacks as $stack) {
            Stack::create($stack);
        }

        $languages = [
            ['name' => 'Inglés'],
            ['name' => 'Francés']
            
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }

        $regions = [
            ['name' => 'Asturias', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'AS'],
            ['name' => 'Galicia','lat' => 42.5750554, 'long' => -8.1338558,'iso' => 'GA']
            
        ];
        foreach ($regions as $region) {
            Region::create($region);
        }

        $provinces = [
            ['region_id' => 1, 'name' => 'Oviedo', 'lat' => 43.3579649, 'long' => -5.8733862,'iso' => 'AS'],
            ['region_id' => 2, 'name' => 'La Coruña','lat' => 43.37135, 'long' => -8.396,'iso' => 'C'],
            ['region_id' => 1, 'name' => 'Gijon','lat' => 43.5453, 'long' => -5.66193,'iso' => 'C']
            
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }

        $schools = [
            ['province_id' => 3, 'name' => 'Asturias', 'lat' => 43.5453, 'long' => -5.66193],
            
            
        ];
        foreach ($schools as $school) {
            School::create($school);
        }

        $promotions = [
            ['school_id' => 1, 'name' => 'FemCodersNorte', 'nick' => 'FEM', 'quantity' => 19],
            ['school_id' => 1, 'name' => 'Asturias', 'nick' => 'AST', 'quantity' => 20],
            ['school_id' => 1, 'name' => 'RuralCamp', 'nick' => 'RURAL', 'quantity' => 20]
        ];
        foreach ($promotions as $promo) {
            Promotion::create($promo);
        }

        \App\Models\Company::factory(10)->create();


    }
}
