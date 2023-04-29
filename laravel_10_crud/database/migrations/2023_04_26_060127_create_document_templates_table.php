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
        Schema::create('document_templates', function (Blueprint $table) {
            $table->id();
            $table->integer('document_type_id');
            // Связь с таблицей document_types
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->string('name')->nullable();
            $table->integer('sort')->nullable();
            $table->string('prefix_table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_templates');
    }
};
