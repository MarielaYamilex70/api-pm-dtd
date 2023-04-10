<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required',
            'ubication' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'priority' => 'required',

        ]);

        $companies = new Company();
        $companies->province_id = $request->province_id;
        $companies->name = $request->name;
        $companies->ubication = $request->ubication;
        $companies->phone = $request->phone;
        $companies->email = $request->email;
        $companies->priority = $request->priority;
        $companies->save();

        if ($companies) {
            $data =[
                'message'=> 'Company created successfully',
                'company'=>$companies        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to created company'], 500);

        // $data = [
        //     'message' => 'Company created successfully',
        //     'company' => $companies
        // ];
        // return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        if ($company) {
            $data =[
                'message'=> 'Company details',
                'company'=>$company        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error'], 500);

        // $data = [
        //     'message' => 'Company details',
        //     'company' => $company
        // ];
        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required',
            'ubication' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'priority' => 'required',

        ]);

        $companies = new Company();
        $companies->province_id = $request->province_id;
        $companies->name = $request->name;
        $companies->ubication = $request->ubication;
        $companies->phone = $request->phone;
        $companies->email = $request->email;
        $companies->priority = $request->priority;
        $companies->save();

        if ($companies) {
            $data =[
                'message'=> 'Company updated successfully',
                'company'=>$companies        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to updated company'], 500);

        // $data = [
        //     'message' => 'Company updated successfully',
        //     'company' => $companies
        // ];
        // return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        if ($company) {
            $data =[
                'message'=> 'Company deleted successfully',
                'company'=>$company        
            ];
            return response()->json($data);
        }
           

        return response()->json(['message' => 'Error to deleted company'], 500);

        // $data = [
        //     'message' => 'Company deleted successfully',
        //     'company' => $company
        // ];
        // return response()->json($data);
    }
}
