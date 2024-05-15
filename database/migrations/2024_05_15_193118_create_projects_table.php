<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("startDate");
            $table->date("endDate");
            $table->json("target");
            $table->string("description");
            $table->unsignedBigInteger('visualization_role_id');
            $table->foreign('visualization_role_id')->references('id')->on('visualization_roles');
            $table->unsignedBigInteger('validity_id');
            $table->foreign('validity_id')->references('id')->on('validities');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
