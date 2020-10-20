<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_team', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedInteger('goals')->default(0);

            $table->primary(['team_id', 'match_id']);

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->cascadeOnDelete()
            ;
            $table->foreign('match_id')
                ->references('id')
                ->on('matches')
                ->cascadeOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_team');
    }
}
