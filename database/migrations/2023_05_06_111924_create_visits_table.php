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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('id_klienta')->nullable();
            $table->foreign('id_klienta')->references('id')->on('users');
            $table->unsignedBigInteger('id_uslugi')->nullable();
            $table->foreign('id_uslugi')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign('visits_id_klienta_foreign');
            $table->dropColumn('id_klienta');
            $table->dropForeign('visits_id_uslugi_foreign');
            $table->dropColumn('id_uslugi');
        });
        Schema::dropIfExists('visits');
    }
};
