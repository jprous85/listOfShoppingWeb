<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RepertoryUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repertory_user', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('repertory_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('repertory_id')
                ->on('repertories')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repertory_user');
    }
}
