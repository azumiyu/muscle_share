<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('users')->insert([
        [
            'name' => '安曇幸寛',
            'email' => 'azumiyukihiro517@icloud.com',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
        [
            'name' => 'テストユーザー',
            'email' => 'aa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'テストユーザー2',
            'email' => 'aaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'テストユーザー3',
            'email' => 'aaaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'テストユーザー4',
            'email' => 'aaaaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ]
        
    ]);
    }
}
