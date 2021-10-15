<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisterMissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mister_misses', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("special")->nullable();
            $table->string("type")->default('Mister');
            $table->string("poster");
            $table->string("video");
            $table->string("full_movie")->nullable();
            $table->string("photos")->nullable();
            $table->string("videos")->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mister_misses');
    }
}
