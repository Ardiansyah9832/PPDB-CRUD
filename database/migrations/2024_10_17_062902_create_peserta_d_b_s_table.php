<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('peserta_d_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sekolah');
            $table->date('tanggallahir');
            $table->string('alamat');
            $table->integer('nisn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_d_b_s');
    }
};
