<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllRecruitersToSchedule;');

        DB::unprepared('
            CREATE PROCEDURE getAllRecruitersToSchedule(
                IN numMatch INT
            )
            BEGIN
                SELECT recruiters.company_id, companies.priority, recruiters.id, recruiters.name, recruiters.interviews_quantity
                FROM recruiters
                JOIN matches
                    ON recruiters.id = matches.recruiter_id
                JOIN companies
                    ON recruiters.company_id = companies.id
                WHERE matches.num_match = numMatch 
                GROUP BY recruiters.id 
                ORDER BY companies.priority, companies.id, recruiters.id;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS getMaxMinCoderInterview;');

        DB::unprepared('
            CREATE PROCEDURE getMaxMinCoderInterview(
                IN id_event INT
            )
            BEGIN
                SELECT maxInterviewCoder, minInterviewCoder
                FROM events
                WHERE events.id = id_event;
            END;
        ');


        DB::unprepared('DROP PROCEDURE IF EXISTS getMatchesRecruiterCoders;');

        DB::unprepared('
            CREATE PROCEDURE getMatchesRecruiterCoders(
                IN numMatch INT,
                IN id_recruiter INT,
                IN id_company INT
            )
            BEGIN
                SELECT coders.id, coders.name, matches.afinity 
                FROM matches
                JOIN recruiters 
                    ON matches.recruiter_id = recruiters.id 
                JOIN companies 
                    ON recruiters.company_id = companies.id     
                JOIN coders 
                    ON matches.coder_id = coders.id 
                
                WHERE matches.num_match = numMatch 
                    AND matches.recruiter_id = id_recruiter
                    AND recruiters.company_id <> id_company
                ORDER BY matches.afinity DESC ;
            END;
        ');

  
        DB::unprepared('DROP PROCEDURE IF EXISTS storeSchedule;');

        DB::unprepared('
            CREATE PROCEDURE storeSchedule(
                IN id_coder INT,
                IN id_recruiter INT,
                IN job_interview INT
            )
            BEGIN
                UPDATE matches SET interview = job_interview
                WHERE coder_id = id_coder AND  recruiter_id = id_recruiter;
                
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_stored_procedures');
    }
};
