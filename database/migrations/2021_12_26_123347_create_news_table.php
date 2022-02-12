<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories','id')->nullOnDelete()->cascadeOnUpdate();
            $table->string('image');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->longText('news_content');
            $table->integer('view_count')->default(0);
            $table->foreignId('admin_id')->nullable()->constrained('users','id')->nullOnDelete()->cascadeOnUpdate();
            $table->string('seo_title')->nullable();
            $table->string('seo_subtitle')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
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
        Schema::dropIfExists('news');
    }
}
