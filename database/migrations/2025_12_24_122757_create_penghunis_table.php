<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('penghunis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kamar_id')->constrained('kamars')->onDelete('cascade');
        $table->string('nama_lengkap');
        $table->string('nik')->unique();
        $table->string('no_hp');
        $table->date('tanggal_masuk');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghunis');
    }
};
