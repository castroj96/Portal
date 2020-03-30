<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('name');
            $table->string('lastName1');
            $table->string('lastName2');
            $table->integer('province')->unsigned();
            $table->foreign('province')->references('id')->on('provinces')->onDelete('cascade');
            $table->integer('canton')->unsigned();
            $table->foreign('canton')->references('id')->on('cantons')->onDelete('cascade');
            $table->integer('district')->unsigned();
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade');
            $table->string('address1');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('email_confirmation')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
