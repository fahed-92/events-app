<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corner_id');
            $table->unsignedBigInteger('no_Kids');
            $table->unsignedBigInteger('no_staff');
            $table->string('liked_activity');
            $table->string('daily_maintenance');
            $table->string('photos_link');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_infos');
    }
}
