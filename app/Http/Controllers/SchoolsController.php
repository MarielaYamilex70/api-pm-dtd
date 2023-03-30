<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = Schools::all();
        return response()->json($schools);
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

        ]);

        $schools = new Schools;
        $schools->name = $request->name;
        $schools->lat = $request->lat;
        $schools->long = $request->long;

        $schools->save();
        $data = [
            'message' => 'School created successfully',
            'schools' => $schools
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schools $schools)
    {
        // return response()->json($schools);
        $data = [
            'message' => 'Schools details',
            'schools' => $schools
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schools $schools)
    {
        $request->validate([
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
        ]);
        $schools->name = $request->name;
        $schools->lat = $request->lat;
        $schools->long = $request->long;
        $schools->save();
        $data = [
            'message' => 'School updated successfully',
            'schools' => $schools
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schools $schools)
    {
        $schools->delete();
        $data =[
            'message'=> 'School deleted successfully',
            'schools'=>$schools        
        ];
        return response()->json($data);
    }
}
