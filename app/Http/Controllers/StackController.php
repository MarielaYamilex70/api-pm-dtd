<?php

namespace App\Http\Controllers;

use App\Models\Stack;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stacks = Stack::all();
        return response()->json($stacks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
         ]);

        $stack = new Stack();
        $stack->name = $request->name;
        $stack->save();
        $data = [
            'message' => 'Stack created successfully',
            'service' => $stack
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stack $stack)
    {
        // return response()->json($stack);
        $data =[
            'message'=> 'Stack details',
            'service'=>$stack        
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stack $stack)
    {
         $request->validate([
            'name' => 'required',
            
         ]);


        $stack->name=$request->name;
        $stack->save();
        $data =[
            'message'=> 'Stack updated successfully',
            'service'=>$stack        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stack $stack)
    {
        $stack->delete();
        $data =[
            'message'=> 'Stack delete successfully',
            'service'=>$stack        
        ];
        return response()->json($data);
    }
}
