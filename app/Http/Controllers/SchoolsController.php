<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return response()->json($schools);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required',
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',

        ]);

        $school = new School;
        $school->province_id = $request->province_id;
        $school->name = $request->name;
        $school->lat = $request->lat;
        $school->long = $request->long;

        $school->save();
        $data = [
            'message' => 'School created successfully',
            'schools' => $school
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        // return response()->json($schools);
        $data = [
            'message' => 'Schools details',
            'schools' => $school
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            'lat' => 'required|float',
            'long' => 'required|float',
        ]);
        $school->name = $request->name;
        $school->lat = $request->lat;
        $school->long = $request->long;
        $school->save();
        $data = [
            'message' => 'School updated successfully',
            'schools' => $school
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        $data =[
            'message'=> 'School deleted successfully',
            'schools'=>$school        
        ];
        return response()->json($data);
    }
}
