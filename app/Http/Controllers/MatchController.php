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
                $recruiters = DB::select('CALL getAllRecruiters()');
                
                foreach ($recruiters as $recruiter){
                    //dd($recruiter->id);
                    echo 'Recruiter: ';
                    print_r($recruiter->id) ;
                    //print_r($recruiter->province_id) ;
                    echo '<br>';

                    $coders = DB::select('CALL getAllCoders()');
                    //dd($coders);
                    //print_r($coders) ; 
                    
                    foreach ($coders as $coder){
                        echo 'Coder: ';
                        print_r($coder->id) ;
                        //print_r($coder->province_id) ;
                        echo '<br>';

                        if ($recruiter->province_id == $coder->province_id) {
                            # code...
                        
                            $stacks = [];
                            $recruiterStacks = DB::select("CALL getRecruitersStacks($recruiter->id)");
                            
                            foreach ($recruiterStacks as $recruiterStack){
                                //dd($recruiterLanguages);
                                //print_r($recruiterStack->stack_id) ;
                                //echo '<br>'; 
                                                        

                                $coderStack = DB::select("CALL getCodersStacks($coder->id, $recruiterStack->stack_id )");
                                //foreach ($coderStacks as $coderStack){
                                    echo "STACK: ";
                                    print_r($coderStack) ;
                                    //print_r($coderStack[0]->stack_id) ;
                                    echo '<br>'; 
                                    if ( $coderStack) {
                                        $stacks[$recruiterStack->stack_id] = 1;

                                        

                                        echo "COINCIDE STACK:$recruiterStack->stack_id DEL CODER: $recruiter->name  CON EL RECLUITER: $coder->name  ";
                                        echo '<br>'; 
                                    }
                                    else{
                                        echo "COINCIDE STACK:$recruiterStack->stack_id DEL CODER: $recruiter->name  CON EL RECLUITER: $coder->name  ";
                                        $stacks[$recruiterStack->stack_id] = 0;
                                    }

                                //}
                                
                            }
                            $sumCoin = 0;
                            foreach ($stacks as $stack) {
                                $sumCoin += $stack;
                                //echo $stack;
                            }

                            echo "SUMA: ".$sumCoin ;
                            
                            $cantStacks =count($stacks);
                            echo "     LONGITUD ARRAY: ".$cantStacks;;
                            echo '<br>'; 

                            $afinity = $sumCoin/$cantStacks;
                            
                            echo "AFINIDAD <$afinity> DEL CODER: $recruiter->name  CON EL RECLUITER: $coder->name  ";
                            echo '=========================================================================<br>'; 

                            //print_r($stacks) ;
                            //echo '<br>'; 

                        }else{

                            echo "AFINIDAD <0> DEL CODER: $recruiter->name  CON EL RECLUITER: $coder->name  ";
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

    
}
