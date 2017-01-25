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
            $table->char('id', 36);
            $table->string('name');
            $table->date('dob');
            $table->string('gender', '10');
            $table->integer('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->primary('id');
            $table->index(['role_id', 'country_id', 'state_id']);
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
