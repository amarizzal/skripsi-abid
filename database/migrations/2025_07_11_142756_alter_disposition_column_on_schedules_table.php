<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE schedules 
            MODIFY disposition ENUM(
                'AGENDAKAN', 
                'DIWAKILI', 
                'DITUNDA', 
                'DIBATALKAN', 
                'MENUNGGU DIKONFIRMASI'
            ) DEFAULT 'MENUNGGU DIKONFIRMASI'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE schedules 
            MODIFY disposition ENUM(
                'AGENDAKAN', 
                'DIWAKILI', 
                'DITUNDA', 
                'DIBATALKAN'
            ) DEFAULT 'AGENDAKAN'");
    }
};
