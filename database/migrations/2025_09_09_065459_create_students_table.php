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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->constrained('users')->cascadeOnDelete();
            $table->string('school_name');
            // Kolom untuk Alamat Penjemputan
            $table->string('pickup_address_jalan')->nullable();
            $table->string('pickup_address_kelurahan')->nullable();
            $table->string('pickup_address_kecamatan')->nullable();
            $table->string('pickup_address_kabupaten')->nullable();
            $table->string('pickup_address_kode_pos')->nullable();
            $table->text('pickup_address_keterangan')->nullable();

            // Kolom untuk Alamat Pengantaran
            $table->string('dropoff_address_jalan')->nullable();
            $table->string('dropoff_address_kelurahan')->nullable();
            $table->string('dropoff_address_kecamatan')->nullable();
            $table->string('dropoff_address_kabupaten')->nullable();
            $table->string('dropoff_address_kode_pos')->nullable();
            $table->text('dropoff_address_keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
