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
        Schema::create('document_template_columns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_template_id');
            $table->bigInteger('column_type_id');
            $table->boolean('required')->nullable();
            $table->timestamps();

            // Связь с таблицей document_templates
            $table->foreign('document_template_id')->references('id')->on('document_templates');
            // Связь с таблицей column_types
            $table->foreign('column_type_id')->references('id')->on('column_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_template_columns');
    }
};
