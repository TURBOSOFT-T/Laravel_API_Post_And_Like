<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('likeables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('like_id');
            /* $table->foreign('like_id')
                ->references('id')
                ->on('likes')
                ->onDelete('cascade')
                ->onUpdate('cascade'); */
            $table->morphs('likeable');
        });
    }
    public function down()
    {
        Schema::dropIfExists('likeables');
    }

};