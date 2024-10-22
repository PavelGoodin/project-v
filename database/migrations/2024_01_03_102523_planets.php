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
        Schema::create('planets', function (Blueprint $table) {
        $table->integer('id');
        $table->string('name')->nullable()->default('Неизвестная');
        $table->integer('planet_level')->default(1);
        $table->integer('max_ships')->default(50);
        $table->integer('energy')->default(2000);
        $table->integer('max_energy')->default(2000);
        $table->integer('population')->default(500);
        $table->integer('ore_mining')->default(10);
        $table->timestamps();
        $table->string('comment');
        $table->boolean('hide')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
