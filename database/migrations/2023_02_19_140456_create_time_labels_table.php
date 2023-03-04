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
        Schema::create('time_labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->comment('ページID');
            $table->integer('play_time')->comment('ラベルに紐づける再生時間（秒数）');
            $table->string('title', 256)->null();
            $table->text('comment')->comment('ラベルコメント');
            $table->foreignId('user_id')->constrained()->comment('作成者');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_labels');
    }
};
