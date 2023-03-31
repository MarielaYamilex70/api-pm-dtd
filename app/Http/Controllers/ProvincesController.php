<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use App\Http\Controllers\Controller;
use App\Models\Promotions;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Provinces::all();
        return response()->json($provinces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'regions_id' => 'required|integer',
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
            'iso' => 'required',

        ]);

        $provinces = new Provinces;
        $provinces->regions_id=$request->regions_id;
        $provinces->name = $request->name;
        $provinces->lat = $request->lat;
        $provinces->long = $request->long;
        $provinces->iso = $request->iso;
        $provinces->save();
        $data = [
            'message' => 'Province created successfully',
            'provinces' => $provinces
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinces $provinces)
    {
        // return response()->json($provinces);
        $data = [
            'message' => 'Province details',
            'provinces' => $provinces
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinces $provinces)
    {
        $request->validate([
            'regions_id' => 'required|integer',
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
            'iso' => 'required',

        ]);
        $provinces->regions_id=$request->regions_id;
        $provinces->name = $request->name;
        $provinces->lat = $request->lat;
        $provinces->long = $request->long;
        $provinces->iso = $request->iso;
        $provinces->save();
        $data = [
            'message' => 'Province updated successfully',
            'provinces' => $provinces
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinces $provinces)
    {
        $provinces->delete();
        $data =[
            'message'=> 'Province deleted successfully',
            'provinces'=>$provinces        
        ];
        return response()->json($data);
    }
}
