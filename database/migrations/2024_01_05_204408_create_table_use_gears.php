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
        Schema::create('table_use_gears_master', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('gear_id')->default(0);
            $table->integer('dt')->default(0);
            $table->integer('position')->default(1);
            $table->boolean('freze')->default(0);
            $table->integer('stage')->default(0);
            $table->boolean('visible')->default(1);
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
        Schema::dropIfExists('table_use_gears');
    }
};
