<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicle_ownership_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id'); // FK
            $table->unsignedBigInteger('previous_owner'); // FK
            $table->unsignedBigInteger('new_owner'); // FK
            $table->timestamps();
    
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('previous_owner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('new_owner')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vehicle_ownership_history');
    }
};
