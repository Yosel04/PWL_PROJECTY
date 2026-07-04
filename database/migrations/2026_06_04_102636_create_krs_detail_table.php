<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('krs_detail', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('kode_krs');

        $table->unsignedBigInteger('kode_kelas');

        $table->enum('status', [
            'pending',
            'approved',
            'declined'
        ]);

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('krs_detail');
    }
};
