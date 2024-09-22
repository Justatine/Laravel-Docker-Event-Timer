<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventId');
            $table->unsignedBigInteger('userId');
            $table->string('name');
            $table->dateTime('deadline', precision: 0);
            $table->enum('status', ['Pending', 'Ongoing', 'Completed'])->default('Pending');
            $table->timestamps();

            $table->foreign('userId')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
