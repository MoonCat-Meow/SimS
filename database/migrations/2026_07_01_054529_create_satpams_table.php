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
        Schema::create('satpams', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('pos_jaga');
            $table->string('status')->default('Aktif');
            $table->string('shift')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satpams');
    }
};
