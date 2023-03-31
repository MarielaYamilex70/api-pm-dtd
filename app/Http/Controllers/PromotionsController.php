<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
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

        $promo = new Promotion;
        $promo->school_id = $request->school_id;
        $promo->name = $request->name;
        $promo->nick = $request->nick;
        $promo->quantity = $request->quantity;

        $promo->save();
        $data = [
            'message' => 'Promotion created successfully',
            'promotion' => $promo
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        $data = [
            'message' => 'Promotion details',
            'promotion' => $promotion
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'school_id' => 'required',
            'name' => 'required',
            'nick' => 'required',
            'quantity' => 'required'

        ]);

        $promotion->school_id = $request->school_id;
        $promotion->name = $request->name;
        $promotion->nick = $request->nick;
        $promotion->quantity = $request->quantity;

        $promotion->save();
        $data = [
            'message' => 'Promotion updated successfully',
            'promotion' => $promotion
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        $data = [
            'message' => 'Promotion deleted successfully',
            'promotion' => $promotion
        ];
        return response()->json($data);
    }
}
