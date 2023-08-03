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
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('start_at')->useCurrent()->comment('Начало проверки');
            $table->timestamp('finish_at')->nullable()->comment('Окончание проверки');
            $table->integer('count_in_base')->nullable()->comment('Колличество в проверке');
            $table->integer('count_fine')->nullable()->comment('Колличество удачно полученных цен');
            $table->integer('count_bug')->nullable()->comment('Колличество ошибок');
            $table->text('bug_track')->nullable()->comment('Отчет об ошибках');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};
