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
    Schema::create('detail_pinjam', function (Blueprint $table) {
        $table->id('nopinjam'); 
        $table->unsignedBigInteger('idanggota'); 
        $table->unsignedBigInteger('idbuku'); 
        
        $table->date('tgl_pinjam');
        $table->date('tgl_kembali');
        $table->integer('denda');
        $table->timestamps();

        $table->foreign('idanggota')
              ->references('idanggota')
              ->on('anggota')
              ->onDelete('cascade') 
              ->onUpdate('cascade'); 

              $table->foreign('idbuku')
              ->references('idbuku')
              ->on('buku')
              ->onDelete('cascade') 
              ->onUpdate('cascade');      
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pinjam');
    }
};
