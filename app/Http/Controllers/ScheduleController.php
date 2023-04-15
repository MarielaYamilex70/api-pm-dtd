<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function demo()
    {
        $NumMatch = DB::select('CALL getNumMatch()');
        //dd($NumMatch);
        if ($NumMatch[0]->NumMatch > 0) {
            echo "Match: ".$NumMatch[0]->NumMatch;
            echo '<br>';
            $recruiters = DB::select('CALL getAllRecruitersToSchedule()');
            
            foreach ($recruiters as $recruiter){
                $interviewsQuantity = $recruiter->interviews_quantity;
                for ($i = 1; $i <= $interviewsQuantity; $i++) {
                    echo $i;
                }

            }


        }
        else{
            echo "Error to fetched Matches";
        }
    }
}
