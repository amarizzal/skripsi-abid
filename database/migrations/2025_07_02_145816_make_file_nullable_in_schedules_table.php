<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFileNullableInSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('file')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('file')->nullable(false)->change();
        });
    }
}

