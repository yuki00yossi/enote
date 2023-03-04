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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained()->comment('紐づけるノートID');
            $table->string('video_id', 256)->null()->comment('ビデオ;ID');
            $table->string('service_type', 256)->null()->comment('動画サービス名。Youtube、Discord等の文字列をいれる');
            $table->string('title')->null()->comment('ページタイトル');
            $table->foreignId('user_id')->constrained()->comment('作成者');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
