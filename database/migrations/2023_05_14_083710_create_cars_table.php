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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('marka');
            $table->string('model');
            $table->date('rok_produkcji');
            $table->text('inf_dodatkowe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->dropForeign('cars_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('cars');
    }
};
