<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username',20);
            $table->string('firstName',20);
            $table->string('lastName',20);
            $table->string('phone',14);
            $table->string('email',25);
            $table->string('password');
            $table->boolean('gender');
            $table->integer('customerType');
            $table->string('modeOfId')->nullable();
            $table->boolean('verified')->nullable();
            $table->string('profilePicture')->nullable();
            $table->string('remember_token')->nullable();
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
