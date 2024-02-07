<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotDailiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascot_dailies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corner_id');
            $table->integer('no_performers');
            $table->integer('no_supervisors');
            $table->integer('no_extra_performers');
            $table->string('no_wardrobe');
            $table->text('comments');
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
        Schema::dropIfExists('mascot_dailies');
    }
}
