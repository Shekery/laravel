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
        Schema::create('document_template_user_relations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_templates_user_id');
            $table->bigInteger('user_id');
            $table->timestamps();

            // Связь с таблицей document_template_users
            $table->foreign('document_templates_user_id')->references('id')->on('document_template_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_template_user_relations');
    }
};
