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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('start_number');
            $table->integer('type_traffic');
            $table->bigInteger('id_design_name_doc');
            $table->bigInteger('id_design_comment');
            $table->integer('organization_id');
            $table->string('instruct_file')->nullable();
            $table->boolean('ability_to_clone')->nullable();
            $table->boolean('ability_to_work')->nullable();
            $table->timestamps();

            // Связь с таблицей organizations
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
};
