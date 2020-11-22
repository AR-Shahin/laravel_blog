<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Admin;

class AddDefalutAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
            'name' => 'Default Admin',
            'email' => 'default@admin.com',
            'password' => bcrypt(123),
            'phone' => 23423459,
            'address' => 'Dhaka,Bangladesh',
            'image' => 'uploads/admin/default.png',
            'status' => 1,
            'added_by' => 'System',
            'created_at' => now()
        ];
        Admin::create($admin);
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
