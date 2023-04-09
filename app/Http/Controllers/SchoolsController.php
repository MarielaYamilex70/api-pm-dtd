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

            // 'lat' => 'required|float',
            // 'long' => 'required|float',

            'lat' => ['required', 'numeric', 'regex:/^-?\d*(\.\d+)?$/'],
            'long' => ['required', 'numeric', 'regex:/^-?\d*(\.\d+)?$/'],



        ]);

        $school = new School;
        $school->province_id = $request->province_id;
        $school->name = $request->name;
        $school->lat = $request->lat;
        $school->long = $request->long;

        $school->save();
        if ($school) {
            $data =[
                'message'=> 'School created successfully',
                'school'=>$school        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to create school'], 500);

        // $data = [
        //     'message' => 'School created successfully',
        //     'schools' => $school
        // ];
        // return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        // return response()->json($schools);

        if ($school) {
            $data =[
                'message'=> 'School details',
                'school'=>$school        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error'], 500);


        // $data = [
        //     'message' => 'Schools details',
        //     'schools' => $school
        // ];
        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            // 'lat' => 'required|float',
            // 'long' => 'required|float',
            'lat' => ['required', 'numeric', 'regex:/^-?\d*(\.\d+)?$/'],
            'long' => ['required', 'numeric', 'regex:/^-?\d*(\.\d+)?$/'],
        ]);
        $school->name = $request->name;
        $school->lat = $request->lat;
        $school->long = $request->long;
        $school->save();

        if ($school) {
            $data =[
                'message'=> 'School update successfully',
                'school'=>$school        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to update school'], 500);




        // $data = [
        //     'message' => 'School updated successfully',
        //     'schools' => $school
        // ];
        // return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        if ($school) {
            $data =[
                'message'=> 'School deleted successfully',
                'school'=>$school        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to delete school'], 500);

        // $data = [
        //     'message' => 'School deleted successfully',
        //     'schools' => $school
        // ];
        // return response()->json($data);
    }
}
