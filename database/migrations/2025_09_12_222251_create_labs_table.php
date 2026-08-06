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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('working_days');
            $table->json('pickup_days');
            $table->integer('dx_ready_day_offset')->default(1); // numero de dias despues de la recolección en que el técnico debe entregar el diagnostico
            $table->time('dx_ready_time')->default(1); // hora en que el técnico entrega el diagnóstico
            $table->integer('dd_notify_offset')->default(1); // numero de dias despues de que dd recibe diagnostico en que se notificará al cliente
            $table->time('dd_notify_time')->default(1); // hora en la que dd notifica el diagnostico al cliente
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
