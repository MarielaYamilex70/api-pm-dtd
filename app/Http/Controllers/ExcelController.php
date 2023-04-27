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
        // Devolver una respuesta JSON

        return response()->json([
            'message' => 'The coders data has been successfully loaded'
        ]);

    }

    public function uploadRecruitersExcel(Request $request){

        // Obtener el archivo Excel cargado
        $file = $request->file('file');
       
        Excel::import(new AuxRecruitersImport, $file);
        // Devolver una respuesta JSON

        return response()->json([
            'message' => 'The recruiters data has been successfully loaded'
        ]);

    }
   
}
