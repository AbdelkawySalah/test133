<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTripPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tripplans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tripagent_serviceid')->references('id')->on('tripagents_service')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('destination');
            $table->string('budget');
            $table->string('travelers_number');
            $table->string('child_age');
            $table->text('other_details');
            
            $table->string('Prefer_communicationtime');
            $table->foreignId('communicationway_id')->references('id')->on('prefer_communicationways')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->enum('status',['pending','confirmed','refused']);

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
        Schema::dropIfExists('booking_tripplans');
    }
}
