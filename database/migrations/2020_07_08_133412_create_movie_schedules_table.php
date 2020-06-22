<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_schedules', function (Blueprint $table) {
            $table->uuid('schedule_id')->primary();
            $table->uuid('movie_name',255);
            $table->char('start_date',8);
            $table->char('end_date',8);
            $table->text('description');
            $table->integer('create_user_id');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->integer('update_user_id');
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_schedules');
    }
}
