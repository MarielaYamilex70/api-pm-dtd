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
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllRecruiters;');

        DB::unprepared('
            CREATE PROCEDURE getAllRecruiters()
            BEGIN
                SELECT * FROM recruiters;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS countRecruiters;');

        DB::unprepared('
            CREATE PROCEDURE countRecruiters()
            BEGIN
                SELECT COUNT(id) FROM recruiters;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiters_stored_procedures');
    }
};
