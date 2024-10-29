<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('estados', function (Blueprint $table) {
            $table->id('id_estado');
            $table->string('estado', 100);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->id('id_tarea');
            $table->string('dni', 15);
            $table->string('titulo', 100);
            $table->text('descripcion');
            $table->date('fecha_vencimiento');
            $table->integer('id_estado');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        DB::table('estados')->insert([
            ['estado' => 'Pendiente'],
            ['estado' => 'En progreso'],
            ['estado' => 'Completada']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::drop('estados');
        Schema::drop('tareas');
    }
};
