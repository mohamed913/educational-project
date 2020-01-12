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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('national_id')->unique()->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('teacher_id_supporter')->nullable()
                ->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('teacher_id_supporter')->references('id')->on('users');
            $table->unsignedBigInteger('course_id')->nullable()
                ->on('courses')->onUpdate('cascade')->onDelete('set null');
//            $table->foreign('course_id')->references('id')->on('courses');
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
