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
        Schema::create('users_games', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nik_name')->nullable()->default('новый агент');
            $table->integer('rating_arena')->default(500);
            $table->string('device');
            $table->integer('ship_rang')->default(1);
            $table->integer('ship_level')->default(1);
            $table->integer('max_hp')->default(50);
            $table->integer('max_energy')->default(20);
            $table->integer('pr_krit')->default(3);
            $table->integer('atk')->default(1);
            $table->integer('kub')->default(3);
            $table->integer('def')->default(0);
            $table->integer('gear1_id')->default(1);
            $table->integer('gear2_id')->default(3);
            $table->integer('gear3_id')->default(1);
            $table->integer('gear4_id')->default(0);
            $table->integer('gear5_id')->default(0);
            $table->integer('gear6_id')->default(0);
            $table->integer('kub1_id')->default(0);
            $table->integer('kub2_id')->default(0);
            $table->integer('kub3_id')->default(0);
            $table->integer('kub4_id')->default(0);
            $table->integer('kub5_id')->default(0);
            $table->integer('pl_shild')->default(0);
            $table->smallInteger('n_collection')->default(0);
            $table->smallInteger('card_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->string('status',50);
            $table->integer('enemy_id')->default(0);
            $table->integer('planet_id')->default(1);
            $table->integer('room_id')->default(0);
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
        Schema::dropIfExists('users_games');
    }
};
