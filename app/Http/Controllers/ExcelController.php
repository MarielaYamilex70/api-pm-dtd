<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class ExcelController extends Controller
{
    public function uploadExcel(Request $request){

        // Obtener el archivo Excel cargado
        //$file = $request->file('file');
        $file = $request->file('file')->store('temp');
        //dd($file);

        // Cargar el archivo Excel con PHP Spreadsheet
        /* $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($file); */

        // Procesar los datos del archivo Excel
        //.....
        
        
        // Devolver una respuesta JSON
        return response()->json(['message' => 'Datos cargados correctamente']);


    }

   
}
