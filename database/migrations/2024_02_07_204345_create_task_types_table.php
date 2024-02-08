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
        Schema::create('task_types', function (Blueprint $table) {
            $table->bigIncrements('task_type_id');
            // $table->string('type', 100);
            $table->string('task_title', 100);
            $table->string('task_description', 255);
            $table->timestamps();

            $table->index('task_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_types');
    }
};
