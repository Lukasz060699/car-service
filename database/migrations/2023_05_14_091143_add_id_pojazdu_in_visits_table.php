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
        Schema::table('visits', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pojazdu')->nullable()->after('user_id');
            $table->foreign('id_pojazdu')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign('visits_id_pojazdu_foreign');
            $table->dropColumn('id_pojazdu');
        });
    }
};
