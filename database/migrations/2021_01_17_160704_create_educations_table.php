<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_info_id')->constrained();
            $table->string('matric')->nullable();
            $table->string('intermadiate')->nullable();
            $table->string('bacholors')->nullable();
            $table->string('masters')->nullable();
            $table->string('phd')->nullable();
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
        Schema::table('educations', function(Blueprint $table){
            $table->dropForeign('user_info_id');
        });
        Schema::dropIfExists('educations');
    }
}
