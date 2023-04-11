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
        DB::unprepared('DROP PROCEDURE IF EXISTS storeMatch;');

        DB::unprepared('
            CREATE PROCEDURE storeMatch(
                IN id_coder INT,
                IN id_recruiter INT,
                IN porc_afinity INT
            )
            BEGIN
                INSERT INTO matches (coder_id, recruiter_id, afinity, created_at, updated_at) 
                VALUES (id_coder, id_recruiter, porc_afinity, NULL, NULL);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_stored_procedures');
    }
};
