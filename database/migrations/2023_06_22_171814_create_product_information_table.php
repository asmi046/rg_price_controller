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
        Schema::create('product_information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("marketplace", 100)->comment('Маркетплейс');
            $table->string("name", 500)->comment('Номенклатура');
            $table->string("saler", 250)->comment('Продавец');
            $table->string("manufacture", 250)->comment('Производитель');
            $table->string("color", 100)->comment('Цвет');
            $table->string("sfera", 100)->comment('Применяемость');
            $table->string("analog_rg", 100)->comment('Аналог RubEX');
            $table->integer("width")->comment('Длина, м');
            $table->integer("diametr")->comment('Диаметр, мм');
            $table->string("link", 2000)->comment('Ссылка на товар');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_information');
    }
};
