<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitializeUsersRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
            'description' => 'Orang yang mengatur atau manage user', // optional
        ]);

        $pengurus = Role::create([
            'name' => 'pengurus',
            'display_name' => 'Pengurus', // optional
            'description' => 'Orang yang dapat mengedit data anggota', // optional
        ]);

        $anggota = Role::create([
            'name' => 'anggota',
            'display_name' => 'Anggota', // optional
            'description' => 'Anggota biasa dan Anggota purna KSR', // optional
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
