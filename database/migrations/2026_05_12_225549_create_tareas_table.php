<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sprint_id');
            $table->string('titulo', 200);
            $table->text('descripcion');
            $table->string('estado', 20)->default('pendiente');
            $table->timestamps();
            $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
