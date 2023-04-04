<?php

namespace App\Http\Controllers;

use App\Models\Coder;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class CoderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coders=Coder::all();
        return response()->json($coders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'promo_id' => 'required',
            'province_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'years' => 'required|integer',
            'avaliability' => 'required',
            'remote' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required',
            'linkedin' => 'required',
            'github' => 'required'

         ]);

        $coder=new Coder;
        $coder->event_id=$request->event_id;
        $coder->promo_id=$request->promo_id;
        $coder->province_id=$request->province_id;
        $coder->name=$request->name;
        $coder->gender=$request->gender;
        $coder->years=$request->years;
        $coder->avaliability=$request->avaliability;
        $coder->remote=$request->remote;
        $coder->email=$request->email;
        $coder->phone=$request->phone;
        $coder->linkedin=$request->linkedin;
        $coder->github=$request->github;
        $coder->save();
        $data =[
            'message'=> 'Coder created successfully',
            'coder'=>$coder        
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coder $coder)
    {
        $data =[
            'message'=> 'Coder details',
            'coder'=>$coder        
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coder $coder)
    {
        $request->validate([
            'event_id' => 'required',
            'promo_id' => 'required',
            'province_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'years' => 'required|integer',
            'avaliability' => 'required',
            'remote' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required',
            'linkedin' => 'required',
            'github' => 'required'

         ]);

        $coder->event_id=$request->event_id;
        $coder->promo_id=$request->promo_id;
        $coder->province_id=$request->province_id;
        $coder->name=$request->name;
        $coder->gender=$request->gender;
        $coder->years=$request->years;
        $coder->avaliability=$request->avaliability;
        $coder->remote=$request->remote;
        $coder->email=$request->email;
        $coder->phone=$request->phone;
        $coder->linkedin=$request->linkedin;
        $coder->github=$request->github;
        $coder->save();
        $data =[
            'message'=> 'Coder updated successfully',
            'coder'=>$coder        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coder $coder)
    {
        $coder->delete();
        $data =[
            'message'=> 'Coder deleted successfully',
            'coder'=>$coder        
        ];
        return response()->json($data);
    }

    public function recruiters(Request $request)
    {
        
        $coders = Coder::find($request->coder_id);
        $recruiters = $coders->recruiter;
        $data =[
            'message'=> 'Recuiters fetched successfuly',
            'recruiters'=>$recruiters        
        ];
        return response()->json($data);
    }

    
}
