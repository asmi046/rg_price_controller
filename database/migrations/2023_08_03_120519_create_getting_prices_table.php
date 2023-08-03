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
        Schema::create('getting_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('load_at')->useCurrent()->comment('Время получения');
            $table->foreignId('load_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_information_id')->constrained("product_information")->onDelete('cascade')->onUpdate('cascade');
            $table->string("name", 500)->comment('Номенклатура');
            $table->string("marketplace", 100)->comment('Маркетплейс');
            $table->string('src_price_value', 1024)->nullable()->comment("Строка цены с сайта");
            $table->float('total_price_value')->nullable()->comment("Базовая цена с сайта");
            $table->float('one_price_value')->nullable()->comment("Цена за единицу сайта");
            $table->boolean('loadet')->default(false)->comment("Цена за единицу сайта");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getting_prices');
    }
};
