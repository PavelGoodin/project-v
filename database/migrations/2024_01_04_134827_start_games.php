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
        Schema::create('start_games', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('master_id')->default(0);//игрок 1(id)
            $table->integer('master_hp')->default(0);//игрок 1(HP)
            $table->integer('master_shield')->default(0);//игрок 1(shield)
            $table->integer('master_dmg')->default(0);//игрок 1(dmg)
            $table->integer('master_energy')->default(0);//игрок 1(energy)
            
            $table->integer('quest_connected')->default(0);//подключение гостя игрок 2(id)
            $table->integer('quest_id')->default(0);//игрок 2(id)
            $table->integer('quest_hp')->default(0);//игрок 2(HP)
            $table->integer('quest_shield')->default(0);//игрок 2(shield)
            $table->integer('quest_dmg')->default(0);//игрок 2(dmg)
            $table->integer('quest_energy')->default(0);//игрок 2(energy)

            $table->integer('first_xod')->default(0);//0-первый ходит мастер
            $table->integer('n_xod')->default(1);//номер раунда

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
