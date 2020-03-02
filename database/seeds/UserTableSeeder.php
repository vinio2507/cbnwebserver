<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'distribuidorcc',
            'email' => 'sac@distribuidorcocacola.com.br',
            'password' => bcrypt('D@distribuidorcc@#2020'),
        ]);
    }
}
