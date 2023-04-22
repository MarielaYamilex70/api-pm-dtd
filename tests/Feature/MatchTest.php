<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;



class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //use RefreshDatabase;
    public function testMatch(): void
    {
        $response = $this->get('/api/match');

        $response->assertStatus(200);
    }

    public function testLastMatch()
    {
        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ($totalRecruiters[0]->total > 0  && $totalCoders[0]->total > 0) {
            $this->assertDatabaseHas('matches', [
                'recruiter_id' => $totalRecruiters[0]->total,
                'coder_id' => $totalCoders[0]->total>0

            ]);
        }
    }

    public function testMatchCount()
    {
        $totalRecruiters = DB::select('CALL countRecruiters()');
        $totalCoders = DB::select('CALL countCoders()');
        if ($totalRecruiters[0]->total > 0  && $totalCoders[0]->total > 0) {

            $this->assertDatabaseCount('matches', $totalRecruiters[0]->total * $totalCoders[0]->total);

        }
        
    }

    public function testMatchOk()
    {
        $coder = DB::table("coders")
        
            ->join("coders_locations","coders.id","=", "coders_locations.coder_id")
            ->join("coders_stacks","coders.id","=", "coders_stacks.coder_id")
            ->join("coders_languages", "coders.id", "=", "coders_languages.coder_id")
            
            ->where("coders_locations.province_id", "=", 1)
            ->Where("coders_stacks.stack_id", "=", 1)
            ->Where("coders_languages.language_id", "=", 1)
            
            ->select("coders.id")
            
            ->first();

        $recruiter = DB::table("recruiters")
        
            ->join("recruiters_locations","recruiters.id","=", "recruiters_locations.recruiter_id")
            ->join("recruiters_stacks","recruiters.id","=", "recruiters_stacks.recruiter_id")
            ->join("recruiters_languages", "recruiters.id", "=", "recruiters_languages.recruiter_id")
            
            ->where("recruiters_locations.province_id", "=", 1)
            ->Where("recruiters_stacks.stack_id", "=", 1)
            ->Where("recruiters_languages.language_id", "=", 1)
            
            ->select("recruiters.id")
            
            ->first();    

        /* if ($coder && $recruiter) {
            $this->assertDatabaseHas('matches', [
                'recruiter_id' => $recruiter->id,
                'coder_id' => $coder->id

            ]);
        } */    
            
        $match = DB::table("matches")
        
            ->where("matches.recruiter_id", "=", $recruiter->id)
            ->Where("matches.coder_id", "=", $coder->id)
            
            
            ->select("matches.id", "matches.afinity")
            
            ->first();                

        if ($match) {
            $this->assertGreaterThan(0, $match->afinity);
        }

        
    }
}
