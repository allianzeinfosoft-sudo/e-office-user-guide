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
        //
        Schema::table('articles', function (Blueprint $table) {
            // Drop old FK if exists
            $table->dropForeign(['topic_id']);

            // Re-add with cascade
            $table->foreign('topic_id')
                ->references('id')
                ->on('topics')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('articles', function (Blueprint $table) {
            // Drop FK
            $table->dropForeign(['topic_id']);

            // Re-add without cascade
            $table->foreign('topic_id')
                ->references('id')
                ->on('topics')
                ->onDelete('restrict');
        });
    }
};
