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
        $recruiter = Recruiter::all();
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
            'name' => 'required',
            'charge' => 'required',
            'remote' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required',
            'interviews_quantity' => 'required|integer'
        ]);

        $recruiter=new Recruiter;
        $recruiter->event_id=$request->event_id;
        $recruiter->company_id=$request->company_id;
       /*  $recruiter->province_id=$request->province_id; */
        $recruiter->name=$request->name;

        $recruiter->charge = $request->charge;

        $recruiter->remote = $request->remote;

        $recruiter->email=$request->email;
        $recruiter->phone=$request->phone;
        $recruiter->linkedin=$request->linkedin;

        $recruiter->interviews_quantity=$request->interviews_quantity;
       
        $recruiter->save();

        if ($recruiter) {
            $data = [
                'message' => 'Recruiter created successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to created recruiter'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {

        if ($recruiter) {
            $data = [
                'message' => 'Recruiter details',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'company_id' => 'required|integer',
            'name' => 'required',
            'charge' => 'required',
            'remote' => 'required|boolean',
            'email' => 'required|email',
            'phone' => 'required',
            'interviews_quantity' => 'required|integer'
        ]);

        $recruiter->event_id=$request->event_id;
        $recruiter->company_id=$request->company_id;
       /*  $recruiter->province_id=$request->province_id; */
        $recruiter->name=$request->name;

        $recruiter->charge = $request->charge;

        $recruiter->remote = $request->remote;

        $recruiter->email=$request->email;
        $recruiter->phone=$request->phone;
        $recruiter->linkedin=$request->linkedin;

        $recruiter->interviews_quantity=$request->interviews_quantity;

       
        $recruiter->save();

        if ($recruiter) {
            $data = [
                'message' => 'Recruiter updated successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to update recruiter'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiter $recruiter)
    {
        $recruiter->delete();
        if ($recruiter) {
            $data = [
                'message' => 'Recruiter deleted successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to delete recruiter'], 500);
    }

    public function attach(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'coder_id' => 'required|integer',
            'afinity' => 'required|numeric|decimal:0,2'

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->coder()->attach($request->coder_id, ['afinity' => $request->afinity]);


        if ($recruiter) {
            $data = [
                'message' => 'Coder attached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to attached Coder'], 500);
    }

    public function detach(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'coder_id' => 'required|integer',

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->coder()->detach($request->coder_id);

        if ($recruiter) {
            $data = [
                'message' => 'Coder detached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to detached Coder'], 500);
    }


    public function coders(Request $request)
    {

        $request->validate([
            'recruiter_id' => 'required|integer'
        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $coders = $recruiter->coder;

        if ($recruiter) {
            $data = [
                'message' => 'Coders fetched successfully',
                'recruiter' => $recruiter,
                'coders' => $coders
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to fetched Coders'], 500);
    }

    public function attachStack(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'stack_id' => 'required|integer'

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->stack()->attach($request->stack_id);

        if ($recruiter) {
            $data = [
                'message' => 'Stack attached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to attached Stack'], 500);
    }

    public function detachStack(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'stack_id' => 'required|integer'

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->stack()->detach($request->stack_id);

        if ($recruiter) {
            $data = [
                'message' => 'Stack detached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to detached Stack'], 500);
    }

    public function attachLanguage(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'language_id' => 'required|integer'

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->language()->attach($request->language_id);

        if ($recruiter) {
            $data = [
                'message' => 'Languages attached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to attached languages'], 500);
    }

    public function detachLanguage(Request $request)
    {
        //
        $request->validate([
            'recruiter_id' => 'required|integer',
            'language_id' => 'required|integer',

        ]);
        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->language()->detach($request->language_id);


        if ($recruiter) {
            $data = [
                'message' => 'Languages detached successfully',
                'recruiter' => $recruiter
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to detached languages'], 500);
    }
}
