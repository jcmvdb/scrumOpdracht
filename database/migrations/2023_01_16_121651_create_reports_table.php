<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id("report_id");
            $table->string("report");
            $table->string('locatie');
            $table->dateTime("begintime")->nullable();
            $table->dateTime("endTime")->nullable();
            $table->string("ovd");
            $table->string("type");
            $table->integer("prio");
            $table->json("vehicles");
            $table->longText("comments");
            $table->json("people_on_station");
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
        Schema::dropIfExists('reports');
    }
};
