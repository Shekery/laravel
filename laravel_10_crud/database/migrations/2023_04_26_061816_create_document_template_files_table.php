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
        Schema::create('document_template_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_template_id');
            $table->boolean('signed_contract');
            $table->timestamps();

            // Связь с таблицей document_templates
            $table->foreign('document_template_id')->references('id')->on('document_templates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_template_files');
    }
};
