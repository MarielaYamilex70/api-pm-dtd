<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions=Region::all();
        return response()->json($regions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'iso'=> 'required',
            
         ]);

        $region=new Region();
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
    public function show(Region $region)
    {
        // return response()->json($region);
        $data =[
            'message'=> 'Region details',
            'region'=>$region      
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'iso'=> 'required',
            
         ]);
        $region->name=$request->name;
        $region->lat=$request->lat;
        $region->long=$request->long;
        $region->iso=$request->iso;
        $region->save();
        $data =[
            'message'=> 'Region updated successfully',
            'region'=>$region        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        $data =[
            'message'=> 'Region delete successfully',
            'region'=>$region        
        ];
        return response()->json($data);
    }
}
