<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            $totalRecruiters = DB::select('CALL countRecruiters()');
            //dd($coders);
            print_r($totalRecruiters) ;
            echo '<br>'; 
            $recruiters = DB::select('CALL getAllRecruiters()');
            //dd($recruiters);
            print_r($recruiters) ;
            echo '<br>'; 
            $totalCoders = DB::select('CALL countCoders()');
            //dd($coders);
            print_r($totalCoders) ;
            echo '<br>'; 
            $coders = DB::select('CALL getAllCoders()');
            //dd($coders);
            print_r($coders) ;
            
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    
}
