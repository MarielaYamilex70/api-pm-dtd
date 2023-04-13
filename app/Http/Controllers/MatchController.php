<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

           /*  $totalRecruiters = DB::select('CALL countRecruiters()');
            //dd($totalRecruiters[0]->total);
            print_r($totalRecruiters) ;
            echo $totalRecruiters[0]->total.'<br>'; 
            $recruiters = DB::select('CALL getAllRecruiters()');
            //dd($recruiters);
            print_r($recruiters) ;
            echo '<br>'; 
            $totalCoders = DB::select('CALL countCoders()');
            //dd($coders);
            print_r($totalCoders) ;
            echo $totalCoders[0]->total.'<br>'; 
            $coders = DB::select('CALL getAllCoders()');
            //dd($coders);
            print_r($coders) ;  */
            $totalRecruiters = DB::select('CALL countRecruiters()');
            $totalCoders = DB::select('CALL countCoders()');
            if ( $totalRecruiters[0]->total > 0  && $totalCoders[0]->total>0  ) {
                
                $newNumMatch = DB::select('CALL getNewNumMatch()');
                
                
                $recruiters = DB::select('CALL getAllRecruiters()');
                
                foreach ($recruiters as $recruiter){
                    //dd($recruiter->id);
                    echo '**********************************************************************************<br>';
                    echo 'Recruiter: ';
                    print_r($recruiter->id) ;
                    //print_r($recruiter->province_id) ;
                    echo '<br>';
                    echo '**********************************************************************************<br>'; 

                    $coders = DB::select('CALL getAllCoders()');
                    //dd($coders);
                    //print_r($coders) ; 
                    
                    foreach ($coders as $coder){
                        echo 'Coder: ';
                        print_r($coder->id) ;
                        //print_r($coder->province_id) ;
                        echo '<br>';



                        //if ($recruiter->province_id == $coder->province_id) {
                            # code...
                        
                        $coincidences = [];

                        $recruiterLocations = DB::select("CALL getRecruiterLocations($recruiter->id)");
                        $coinLocation = 0;
                        foreach ($recruiterLocations as $recruiterLocation){

                            $coderLocation = DB::select("CALL getCoderLocation($coder->id, $recruiterLocation->province_id )");
                            echo "Recruiter Locations: ".$recruiterLocation->province_id;
                            if ($coderLocation) {
                                $coinLocation = 1;
                                echo " Coder Locations: ".$coderLocation[0]->province_id;
                                echo '<br>'; 
                            }



                        } 
                        echo '<br>'; 
                        echo "Recruiter Remote:".$recruiter->remote;
                        echo '<br>'; 
                        if ( $coinLocation || $recruiter->remote) {
                            
                           

                            $recruiterStacks = DB::select("CALL getRecruiterStacks($recruiter->id)");
                            foreach ($recruiterStacks as $recruiterStack){
                                //dd($recruiterLanguages);
                                //print_r($recruiterStack->stack_id) ;
                                //echo '<br>'; 
                                                        

                                $coderStack = DB::select("CALL getCoderStack($coder->id, $recruiterStack->stack_id )");
                                //foreach ($coderStacks as $coderStack){
                                    echo "STACK: ";
                                    //print_r($coderStack) ;
                                    //print_r($coderStack[0]->stack_id) ;
                                    echo '<br>'; 
                                    if ( $coderStack) {
                                        //$coincidences[$recruiterStack->stack_id] = 1;
                                        array_push($coincidences, 1);

                                        echo "COINCIDE STACK:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                        echo '<br>'; 
                                    }
                                    else{
                                        //$coincidences[$recruiterStack->stack_id] = 0;
                                        array_push($coincidences, 0);
                                        echo "NOOOOO COINCIDE STACK:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                        echo '<br>'; 
                                    }

                                //}
                                
                            }
                            /*$sumCoincidences = 0;
                             foreach ($coincidences as $coincidence) {
                                $sumCoincidences += $coincidence;
                                //echo $coincidence;
                            }

                            echo "SUMA: ".$sumCoincidences ;
                            
                            $cantCoincidences =count($coincidences);
                            echo "     LONGITUD ARRAY: ".$cantCoincidences;;
                            echo '<br>';  */

                            if (array_sum($coincidences)) {
                               
                                $recruiterLanguages = DB::select("CALL getRecruiterLanguages($recruiter->id)");
                                foreach ($recruiterLanguages as $recruiterLanguage){
                            
                                    $coderLanguage = DB::select("CALL getCoderLanguage($coder->id, $recruiterLanguage->language_id )");
                                    //foreach ($coderStacks as $coderStack){
                                    echo "LANGUAGE: ";
                                    //print_r($coderStack) ;
                                    //print_r($coderStack[0]->stack_id) ;
                                    echo '<br>'; 
                                    if ( $coderLanguage) {
                                        array_push($coincidences, 1);

                                        echo "COINCIDE LANGUAGE:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                        echo '<br>'; 
                                    }
                                    else{
                                        array_push($coincidences, 0);
                                        echo "NOOOOO COINCIDE LANGUAGE:$recruiterStack->stack_id DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name  ";
                                        echo '<br>'; 
                                    }
                            
                                }
                            
                            }





                            $afinity = array_sum($coincidences)/count($coincidences)*100;

                            

                            $match = DB::insert("CALL storeMatch($coder->id, $recruiter->id, $afinity,  $newNumMatch )");
                            
                            echo "AFINIDAD <$afinity> DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                            echo '=========================================================================<br>'; 

                            //print_r($stacks) ;
                            //echo '<br>'; 

                        }else{
                            echo "NO coincide Afinidad NI Teletrabajo DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                            echo "AFINIDAD <0> DEL RECLUITER: $recruiter->name  CON EL CODER: $coder->name <br>  ";
                            echo '=========================================================================<br>'; 
                                
                        }
                        
                    }
                   
                    



                    /* $coders = DB::select('CALL getAllCoders()');
                    //dd($coders);
                    print_r($coders) ;
                   
                    echo '<br>'; 
 */
                }
            }
            
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    public function getnumatches ()
    {
       //Devuelve todos los Numeros de Matches y la fecha
    }
    
}
