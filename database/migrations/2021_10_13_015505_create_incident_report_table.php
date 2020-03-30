<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_report', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category')->unsigned();
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('company')->unsigned();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('province')->unsigned();
            $table->foreign('province')->references('id')->on('provinces')->onDelete('cascade');
            $table->integer('canton')->unsigned();
            $table->foreign('canton')->references('id')->on('cantons')->onDelete('cascade');
            $table->integer('district')->unsigned();
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade');
            $table->string('address');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->json('pictures');
            $table->string('details');
            $table->boolean('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_report');
    }
}
