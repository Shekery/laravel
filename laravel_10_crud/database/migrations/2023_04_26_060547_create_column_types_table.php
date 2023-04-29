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
        Schema::create('column_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('classes')->nullable();
            $table->string('type_template')->nullable();
            $table->string('type_input')->nullable();
            $table->string('select_options')->nullable();
            $table->string('div_row_classes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('column_types');
    }
};
