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
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('start_at')->comment('Nếu start_at < now : Hiển thị "Đang chờ đăng", Nếu start_at > now : Hiển thị "Đã đăng"');
            $table->timestamp('end_at')->nullable()->comment('Nếu end_at < now : "Đã hết hạn"');
            $table->tinyInteger('is_suppension')->comment('Nếu is_suppension = 1 : Hiển thị "Đã dừng"');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
