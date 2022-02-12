<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->longText('facebook')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('watsaap')->nullable();
            $table->longText('pinterest')->nullable();
            $table->longText('gogle')->nullable();
            $table->longText('linkedin')->nullable();
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
        Schema::dropIfExists('socials');
    }
}
