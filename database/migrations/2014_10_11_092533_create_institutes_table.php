<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('institutes')){
            Schema::create('institutes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('short_name');
                $table->string('address');
                $table->string('email');
                $table->string('phone');
                $table->string('fax')->nullable();
                $table->string('mobile')->nullable();
                $table->string('website')->nullable();
                $table->string('logo')->nullable();
                $table->string('banner')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutes');
    }
}
