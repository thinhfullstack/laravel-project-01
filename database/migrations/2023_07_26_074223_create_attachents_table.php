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
        Schema::create('attachents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_path')->default('collate');
            $table->string('attachable_type')->nullable(false);
            $table->string('file_name')->default('collate');
            $table->bigInteger('attachable_id')->unsigned()->nullable(false);
            $table->string('extension')->default('collate');
            $table->string('mime_type')->default('collate');
            $table->integer('size')->unsigned()->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachents');
    }
};
