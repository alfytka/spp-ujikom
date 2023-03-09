<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id')->nullable();
            $table->foreignId('siswa_id');
            $table->string('tgl_bayar');
            $table->string('bulan_bayar');
            $table->string('tahun_bayar');
            $table->bigInteger('jumlah_bayar');
            $table->enum('jenis_pembayaran',['siswa','petugas'])->default('petugas');
            $table->string('metode_pembayaran')->nullable();
            $table->enum('status', ['diproses','sukses','gagal'])->default('sukses');
            $table->text('foto_bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
