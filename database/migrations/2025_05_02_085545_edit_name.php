<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::rename('dokumens', 'schedules');
    }

    public function down()
    {
        Schema::rename('schedules', 'dokumens');
    }
};


