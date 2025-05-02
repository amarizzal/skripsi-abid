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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->string('content');
            $table->string('dresscode');
            $table->enum('audience', [
                'INTERNAL', 'EKSTERNAL'
            ])->default('INTERNAL');
            $table->enum('disposition', [
                'AGENDAKAN', 'DIWAKILI',
                'DITUNDA',
                'DIBATALKAN'
            ])->default('AGENDAKAN');
            $table->enum('access_level', [
                'PUBLIK', 
                'RAHASIA'
            ])->default('PUBLIK');
            $table->timestamp('date');
            $table->timestamps();
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
