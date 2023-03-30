<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recruiter=Recruiter::all();
        return response()->json($recruiter);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'company_id' => 'required|integer',
            'province_id' => 'required|integer',
            'name' => 'required',
            'charge' => 'required',
            'remote' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required',
            'linkedin' => 'required'
        ]);

        $recruiter=new Recruiter;
        $recruiter->event_id=$request->event_id;
        $recruiter->company_id=$request->company_id;
        $recruiter->province_id=$request->province_id;
        $recruiter->name=$request->name;

        $recruiter->charge=$request->charge;
       
        $recruiter->remote=$request->remote;

        $recruiter->email=$request->email;
        $recruiter->phone=$request->phone;
        $recruiter->linkedin=$request->linkedin;
       
        $recruiter->save();
        $data =[
            'message'=> 'Recruiter created successfully',
            'recruiter'=>$recruiter        
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {
        $data =[
            'message'=> 'Recruiter details',
            'recruiter'=>$recruiter        
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'company_id' => 'required|integer',
            'province_id' => 'required|integer',
            'name' => 'required',
            'charge' => 'required',
            'remote' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required',
            'linkedin' => 'required'
        ]);

        $recruiter->event_id=$request->event_id;
        $recruiter->company_id=$request->company_id;
        $recruiter->province_id=$request->province_id;
        $recruiter->name=$request->name;

        $recruiter->charge=$request->charge;
       
        $recruiter->remote=$request->remote;

        $recruiter->email=$request->email;
        $recruiter->phone=$request->phone;
        $recruiter->linkedin=$request->linkedin;
       
        $recruiter->save();
        $data =[
            'message'=> 'Recruiter updated successfully',
            'recruiter'=>$recruiter        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiter $recruiter)
    {
        $recruiter->delete();
        $data =[
            'message'=> 'Recruiter deleted successfully',
            'recruiter'=>$recruiter        
        ];
        return response()->json($data);
    }
}
