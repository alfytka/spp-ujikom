<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique()->nullable(); // siswa
            $table->string('nis')->unique()->nullable(); // siswa
            $table->string('name');                     // all user
            $table->foreignId('kelas_id')->nullable(); // siswa
            $table->foreignId('spp_id')->nullable();  // siswa
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('email')->unique();       // all user
            $table->string('username');             // all user
            $table->text('password');              // all user
            $table->string('telepon')->nullable();// admin
            $table->text('alamat')->nullable();  // admin
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('level', ['admin','petugas','siswa']); // all user
            $table->text('foto')->nullable(); // all user
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
