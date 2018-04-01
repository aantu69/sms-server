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
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->integer('institute_id')->unsigned()->default(1);
                $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
                $table->rememberToken();
                $table->timestamps();
            });
        }
        


        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('first_name')->nullable();
        //     $table->string('last_name')->nullable();
        //     $table->integer('inst_id')->unsigned();
        //     $table->foreign('inst_id')->references('id')->on('institutes')->onDelete('cascade');
        // });
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
