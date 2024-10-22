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
        Schema::create('planet_chat', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->default(0);
            $table->integer('planet_id')->default(0);
            $table->string('message')->nullable()->default('---');
            $table->timestamps();
            $table->integer('hide')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_chat');
    }
};
