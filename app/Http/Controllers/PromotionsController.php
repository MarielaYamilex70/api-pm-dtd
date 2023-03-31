<?php

namespace App\Http\Controllers;

use App\Models\Promotions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotions::all();
        return response()->json($promotions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required',
            'name' => 'required',
            'nick' => 'required',
            'quantity' => 'required'

        ]);

        $promo = new Promotions;
        $promo->school_id = $request->school_id;
        $promo->name = $request->name;
        $promo->nick = $request->nick;
        $promo->quantity = $request->quantity;

        $promo->save();
        $data = [
            'message' => 'Promotion created successfully',
            'promotions' => $promo
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotions $promotions)
    {
        $data = [
            'message' => 'Promotion details',
            'promotions' => $promotions
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotions $promotions)
    {
        $request->validate([
            'school_id' => 'required',
            'name' => 'required',
            'nick' => 'required',
            'quantity' => 'required'

        ]);

        $promotions->school_id = $request->school_id;
        $promotions->name = $request->name;
        $promotions->nick = $request->nick;
        $promotions->quantity = $request->quantity;

        $promotions->save();
        $data = [
            'message' => 'Promotion updated successfully',
            'promotions' => $promotions
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotions $promotions)
    {
        $promotions->delete();
        $data = [
            'message' => 'Promotion deleted successfully',
            'promotion' => $promotions
        ];
        return response()->json($data);
    }
}
