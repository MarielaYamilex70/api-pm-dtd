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
use Illuminate\Support\Facades\DB;

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
            ['name' => 'Inglés/Alto'],
            ['name' => 'Inglés/Medio'],
            ['name' => 'Inglés/Bajo']
            
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

        \App\Models\Event::factory(1)->create();

        \App\Models\Coder::factory(59)
            ->create()
            ->each(function($coder){
                
                $numStacks=random_int(1,2);
                $stacks=Stack::select('id')
                    ->inRandomOrder()
                    ->limit($numStacks)
                    ->distinct()
                    ->get();
                foreach($stacks as $stack){
                    DB::table('coders_stacks')->insert([
                        [
                            'coder_id'=> $coder->id,
                            'stack_id'=> $stack->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

                $numLanguages=random_int(1,3);
                $languages=Language::select('id')
                    ->inRandomOrder()
                    ->limit($numLanguages)
                    ->distinct()
                    ->get();
                foreach($languages as $language){
                    DB::table('coders_languages')->insert([
                        [
                            'coder_id'=> $coder->id,
                            'language_id'=> $language->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

                $numlocations=random_int(1,3);
                $locations=Province::select('id')
                    ->inRandomOrder()
                    ->limit($numlocations)
                    ->distinct()
                    ->get();
                foreach($locations as $location){
                    DB::table('coders_locations')->insert([
                        [
                            'coder_id'=> $coder->id,
                            'province_id'=> $location->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

            });

        \App\Models\Recruiter::factory(20)
            ->create()
            ->each(function($recruiter){
                
                $numStacks=random_int(1,2);
                $stacks=Stack::select('id')
                    ->inRandomOrder()
                    ->limit($numStacks)
                    ->distinct()
                    ->get();
                foreach($stacks as $stack){
                    DB::table('recruiters_stacks')->insert([
                        [
                            'recruiter_id'=> $recruiter->id,
                            'stack_id'=> $stack->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

                $numLanguages=random_int(1,2);
                $languages=Language::select('id')
                    ->inRandomOrder()
                    ->limit($numLanguages)
                    ->distinct()
                    ->get();
                foreach($languages as $language){
                    DB::table('recruiters_languages')->insert([
                        [
                            'recruiter_id'=> $recruiter->id,
                            'language_id'=> $language->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

                $numlocations=random_int(1,3);
                $locations=Province::select('id')
                    ->inRandomOrder()
                    ->limit($numlocations)
                    ->distinct()
                    ->get();
                foreach($locations as $location){
                    DB::table('recruiters_locations')->insert([
                        [
                            'recruiter_id'=> $recruiter->id,
                            'province_id'=> $location->id,
                            'created_at'=> now(),
                            'updated_at'=> now()
                        ]
                    ]);
                }

            });
    }
}
