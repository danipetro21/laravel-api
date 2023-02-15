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
        Schema::table('genres', function (Blueprint $table) {

            $table->foreignId('movies_id')
                ->constrained();
        });

        Schema::table('movie_tag', function (Blueprint $table) {

            $table->foreignId('movies_id')
                ->constrained();
            $table->foreignId('tags_id')
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('genres', function (Blueprint $table) {

            $table -> dropForeign('genres_movies_id_foreign');
        });
        Schema::table('movie_tag', function (Blueprint $table) {

            $table -> dropForeign('movie_tag_movies_id_foreign');
            $table -> dropForeign('movie_tag_tags_id_foreign');
        });
    }
};
