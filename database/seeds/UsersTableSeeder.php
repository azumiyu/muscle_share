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
            'id' => '1',
            'name' => '安曇幸寛',
            'email' => 'azumiyukihiro517@icloud.com',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
        [
            'id' => '2',
            'name' => 'テストユーザー',
            'email' => 'aa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '3',
            'name' => 'テストユーザー2',
            'email' => 'aaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '4',
            'name' => 'テストユーザー3',
            'email' => 'aaaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '5',
            'name' => 'テストユーザー4',
            'email' => 'aaaaa@aa',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ]
        
    ]);
    }
}
