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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger("country_is");
            $table->unsignedBigInteger("marth_id");
            $table->foreign("country_is")
            ->references("id")
            ->on("countrys")
            ->onDelete('cascade');
            $table->foreign("marth_id")
            ->references("id")
            ->on("marths")
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
