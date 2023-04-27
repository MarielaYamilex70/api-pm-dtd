<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
//use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Imports\CompaniesImport;
use App\Imports\CodersImport;
use App\Imports\AuxCodersImport;
use App\Imports\RecruitersImport;
use App\Imports\AuxRecruitersImport;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function uploadCompaniesExcel(Request $request){

        // Obtener el archivo Excel cargado
        $file = $request->file('file');
       
        Excel::import(new CompaniesImport, $file);
        
        // Devolver una respuesta JSON
        return response()->json([
            'message' => 'The companies data has been successfully loaded'
        ]);

    }

    public function uploadCodersExcel(Request $request){

        // Obtener el archivo Excel cargado
        $file = $request->file('file');
       
        Excel::import(new CodersImport, $file);

        Excel::import(new AuxCodersImport, $file);

        $coderPivots = DB::select('CALL getPivotCoders()');
        dd($coderPivots);
        foreach ($coderPivots as $coderPivot){
        }    
        
        // Devolver una respuesta JSON
        return response()->json([
            'message' => 'The coders data has been successfully loaded'
        ]);

        

    }

    public function uploadRecruitersExcel(Request $request){

        // Obtener el archivo Excel cargado
        //$file = $request->file('file');
       
        //Excel::import(new RecruitersImport, $file);

        //Excel::import(new AuxRecruitersImport, $file);

        $recruiterPivots = DB::select('CALL getPivotRecruiters()');
        //dd($recruiterPivots);
        foreach ($recruiterPivots as $recruiterPivot){
           /*  if ($recruiterPivot->barcelona) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 4)");
            }
            if ($recruiterPivot->madrid) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 5)");
            }
            if ($recruiterPivot->asturias) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 6)");
            }
            if ($recruiterPivot->sevilla) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 7)");
            }
            if ($recruiterPivot->malaga) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 8)");
            }
            if ($recruiterPivot->cantabria) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 9)");
            }
            if ($recruiterPivot->galicia) {
                $recruiterLocation = DB::insert("CALL storeRecruiterLocation($recruiterPivot->id, 10)");
            } */
            

            if ($recruiterPivot->php) {
                $recruiterStack = DB::insert("CALL storeRecruiterStack($recruiterPivot->id, 1)");
            }

            if ($recruiterPivot->java) {
                $recruiterStack = DB::insert("CALL storeRecruiterStack($recruiterPivot->id, 2)");
            }
            

            if ($recruiterPivot->idioma == 'Inglés alto') {
                $recruiterLanguage = DB::insert("CALL storeRecruiterLanguage($recruiterPivot->id, 1)");
            }
                        
        }


         
        // Devolver una respuesta JSON
        return response()->json([
            'message' => 'The recruiters data has been successfully loaded'
        ]);

    }
   
}
