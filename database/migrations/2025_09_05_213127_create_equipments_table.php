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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subdevice_id')->constrained('subdevices');
            $table->foreignId('brand_id')->constrained('brands');
            $table->string('family')->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('color');
            $table->string('full_name');
            $table->json('metadata')->nullable();
            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Índices normales
            |--------------------------------------------------------------------------
            */
            $table->index('model');
            $table->index('serial');

            /*
            |--------------------------------------------------------------------------
            | FULLTEXT para búsquedas generales
            |--------------------------------------------------------------------------
            */
            $table->fullText('full_name', 'equipments_fulltext_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
