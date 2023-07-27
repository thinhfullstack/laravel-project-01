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
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('link');
            $table->decimal('price', 17, 2);
            $table->decimal('old_price', 17, 2);
            $table->bigInteger('created_by')->comment('người tạo khoá học');
            $table->bigInteger('category_id');
            $table->integer('lessons')->comment('tổng số bài học trong khoá học');
            $table->integer('view_count')->comment('tổng số lượt xem');
            $table->json('benefits');
            $table->json('fqa');
            $table->tinyInteger('is_feature');
            $table->tinyInteger('is_online');
            $table->text('description');
            $table->longText('content');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
