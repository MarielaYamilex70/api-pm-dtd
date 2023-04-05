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
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllCoders;');

        DB::unprepared('
            CREATE PROCEDURE getAllCoders()
            BEGIN
                SELECT * FROM coders;
            END;
        ');

        DB::unprepared('DROP PROCEDURE IF EXISTS countCoders;');

        DB::unprepared('
            CREATE PROCEDURE countCoders()
            BEGIN
                SELECT COUNT(id) FROM coders;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coders_stored_procedures');
    }
};
