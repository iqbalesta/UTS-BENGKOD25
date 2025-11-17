<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('daftar_poli', function (Blueprint $table) {
            $table->renameColumn('id_pasien', 'id_teknisi');
        });
    }

    public function down()
    {
        Schema::table('daftar_poli', function (Blueprint $table) {
            $table->renameColumn('id_teknisi', 'id_pasien');
        });
    }
};
