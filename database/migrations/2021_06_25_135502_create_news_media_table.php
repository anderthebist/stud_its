<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_media', function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->string("type",20);
            $table->bigInteger("news_id")->unsigned();
            $table->foreign("news_id")->references("id")->on("news")->onDelete('cascade');
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
        Schema::dropIfExists('news_media');
    }
}
