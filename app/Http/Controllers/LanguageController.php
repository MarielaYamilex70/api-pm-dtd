<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return response()->json($languages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            
         ]);
        $language = new Language();
        $language->name = $request->name;
        $language->save();
        $data = [
            'message' => 'Language created successfully',
            'service' => $language
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
         // return response()->json($language);
         $data =[
            'message'=> 'Language details',
            'service'=>$language        
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',
            
         ]);
         
        $language->name=$request->name;
        $language->save();
        $data =[
            'message'=> 'Language updated successfully',
            'service'=>$language        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();
        $data =[
            'message'=> 'Language delete successfully',
            'service'=>$language        
        ];
        return response()->json($data);
    }

    public function recruiters(Request $request)
    {
        
        $languages = Language::find($request->language_id);
        $recruiters = $languages->recruiter;
        $data =[
            'message'=> 'Recuiters fetched successfuly',
            'recruiters'=>$recruiters        
        ];
        return response()->json($data);
    }
    
    public function coders(Request $request)
    {
        
        $languages = Language::find($request->language_id);
        $coders = $languages->coders;
        $data =[
            'message'=> 'Coders fetched successfully',
            'coders'=>$coders        
        ];
        return response()->json($data);
    }









}
