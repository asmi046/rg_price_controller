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
        Schema::table('product_information', function (Blueprint $table) {
            $table->string("code_1c_rg", 50)->nullable()->comment('Код 1С RubEX');
            $table->float("vc_plan")->nullable()->comment('VC план');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_information', function (Blueprint $table) {
            //
        });
    }
};
