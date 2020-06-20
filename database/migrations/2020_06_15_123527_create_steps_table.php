<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('step');
            $table->boolean('isCompleted')->default(false);
            $table->unsignedBigInteger('subGoal_id');
            $table->foreign('subGoal_id')->references('id')->on('sub_goals');
            $table->unsignedBigInteger('objective');
            $table->foreign('objective_id')->references('id')->on('sub_goals');
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
        Schema::dropIfExists('steps');
    }
}
