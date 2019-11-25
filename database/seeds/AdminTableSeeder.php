<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'rupan',
            'password' => '$2y$10$EAlAIi2lsz51P8dwNag29O7dlAH.eY1gV7N.FwEv5kCcSdv2RpLNS',
            'email'=>'rupandangol87@gmail.com',
            'status' => '1',
            'privileges' => 'Super Admin']);
    }
}
