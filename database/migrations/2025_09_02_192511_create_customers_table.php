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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nombre
            $table->string('phone'); // telefono1
            $table->boolean('phone_whatsapp')->default(true); // tel1_whatsapp
            $table->string('email')->nullable(); // email
            $table->string('company')->nullable(); // empresa
            $table->foreignId('invoice_option_id')->constrained('invoice_options')->onDelete('cascade'); // opcion_factura_id
            $table->json('metadata')->nullable();
            $table->foreignId('lead_source_id')->constrained('lead_sources')->onDelete('cascade'); // fuente_id
            $table->foreignId('contact_channel_id')->constrained('contact_channels')->onDelete('cascade'); // medio_id
            $table->string('photo_path')->nullable(); // foto
            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Índices normales (útiles para búsquedas exactas)
            |--------------------------------------------------------------------------
            */
            $table->index('phone');
            $table->index('email');

            /*
            |--------------------------------------------------------------------------
            | FULLTEXT para búsquedas rápidas por texto
            |--------------------------------------------------------------------------
            */
            $table->fullText([
                'name',
                'company',
            ], 'customers_fulltext_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
