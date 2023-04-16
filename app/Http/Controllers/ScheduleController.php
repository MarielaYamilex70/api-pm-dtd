<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class ScheduleController extends Controller
{
    public function demo()
    {
        $numMatch = DB::select('CALL getNumMatch()');
        //dd($NumMatch);
        if ($numMatch[0]->NumMatch > 0) {
            $lastNumMatch = $numMatch[0]->NumMatch;
            echo "Match: ".$lastNumMatch;
            echo '<br>';

            $event = 1; 
            $MaxMinCoderInterview = DB::select("CALL getMaxMinCoderInterview($event)");
            echo " MAX ENTREVISTAS POR CODER:  ".$MaxMinCoderInterview[0]->maxInterviewCoder;
            echo '<br>';
            echo " MIN ENTREVISTAS POR CODER:  ".$MaxMinCoderInterview[0]->minInterviewCoder;
            echo '<br>';
            $recruiters = DB::select("CALL getAllRecruitersToSchedule($lastNumMatch)");
            
            foreach ($recruiters as $recruiter){
                $interviews = 1;
                $interviewsQuantity = $recruiter->interviews_quantity;
                echo "***********************************************";
                echo '<br>';
                echo "ID: ".$recruiter->id."  NOMBRE:  ".$recruiter->name."  COMPANY:  ".$recruiter->company_id;
                echo '<br>';
                echo "***********************************************";
                echo '<br>';
                echo " TOTAL ENTREVISTAS DEL RECRUITER:  ".$interviewsQuantity;
                echo '<br>';

                $coders = DB::select("CALL getMatchesRecruiterCoders($lastNumMatch, $recruiter->id)");
                //echo "CALL getMatchesRecruiterCoders($lastNumMatch,$recruiter->id,$recruiter->company_id)";
                //dd($coders);
                foreach ($coders as $coder){
                    
                    if ($coders) echo $coder->name;
                    echo '<br>';
                    

                    $totalCoderSchedule = DB::select("CALL getTotalCoderSchedule($lastNumMatch, $coder->id)");
                    if ($totalCoderSchedule[0]->total <= $MaxMinCoderInterview[0]->maxInterviewCoder)  echo "El coder no supera el numero maximo de entrevistas";
                    echo '<br>';
                    $coderSchedule = DB::select("CALL getCoderSchedule($lastNumMatch, $coder->id, $interviews)");
                    if (!$coderSchedule)  echo "El coder no tiene asignado la entrevista, el numero de entrevista";
                    echo '<br>';
                    $CoderCompanySchedule = DB::select("CALL getCoderCompanySchedule($lastNumMatch, $coder->id, $recruiter->company_id )");
                    if (!$CoderCompanySchedule)  echo "El Coder no tiene asignado otra entrevista con la misma Empresa";
                    echo '<br>';
                    //dd($CoderCompanySchedule);    
                    

                    if (($totalCoderSchedule[0]->total < $MaxMinCoderInterview[0]->maxInterviewCoder) && !$coderSchedule && !$CoderCompanySchedule ) {
                        //dd($coders);
                        echo "Se asigna la ENTREVISTA: $interviews  del RECRUITER: $recruiter->name  con el CODER: $coder->name que tienen una AFINIDAD: $coder->afinity% ";
                        echo '<br>';

                        $Schedule = DB::update("CALL storeSchedule($coder->id, $recruiter->id, $interviews)");
                      
                        $interviews++;

                        if ($interviews > $interviewsQuantity) {
                            //Se terminaron las entrevistas del RECRUITER 
                            break;
                        }
                    }
                 

                }

            }


        }
        else{
            echo "Error to fetched Matches";
        }
    }
}
