<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    public function up()
    {
        // Perbaiki enum role
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE users MODIFY role ENUM('teknisi','dokter','admin')");
        });

        // Tambah user admin default jika belum ada
        $admin = DB::table('users')->where('role', 'admin')->first();
        if (!$admin) {
            DB::table('users')->insert([
                'nama' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'alamat' => 'admin',
                'no_hp' => '08123456789',
                'no_ktp' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        // Kembalikan enum role ke default lama jika perlu
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE users MODIFY role ENUM('pasien','teknisi','dokter','admin')");
        });
        // Tidak menghapus user admin
    }
};
