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
        Schema::create('document_template_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_template_id');
            $table->boolean('multiple_choice_select');
            $table->string('type');
            $table->boolean('know');
            $table->integer('sign');
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
        Schema::dropIfExists('document_template_users');
    }
};
