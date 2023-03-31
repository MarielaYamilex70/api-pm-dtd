<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions=Regions::all();
        return response()->json($regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
            'iso'=> 'required',
            
         ]);

        $region=new Regions();
        $region->name=$request->name;
        $region->lat=$request->lat;
        $region->long=$request->long;
        $region->iso=$request->iso;
        $region->save();
        $data =[
            'message'=> 'Region created successfully',
            'region'=>$region        
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Regions $regions)
    {
        // return response()->json($region);
        $data =[
            'message'=> 'Region details',
            'regions'=>$regions       
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regions $regions)
    {
        $request->validate([
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
            'iso'=> 'required',
            
         ]);
        $regions->name=$request->name;
        $regions->lat=$request->lat;
        $regions->long=$request->long;
        $regions->iso=$request->iso;
        $regions->save();
        $data =[
            'message'=> 'Region updated successfully',
            'regions'=>$regions        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regions $regions)
    {
        $regions->delete();
        $data =[
            'message'=> 'Region delete successfully',
            'regions'=>$regions        
        ];
        return response()->json($data);
    }
}
