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
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('penghuni_id')->constrained('penghunis')->onDelete('cascade');
        $table->date('tanggal_bayar');
        $table->string('bulan_tagihan'); // Contoh: "Januari 2025"
        $table->decimal('jumlah_bayar', 10, 2);
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
