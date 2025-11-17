<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        DB::table('users')->where('role', 'pasien')->update(['role' => 'teknisi']);
    }

    public function down()
    {
        DB::table('users')->where('role', 'teknisi')->update(['role' => 'pasien']);
    }
};
