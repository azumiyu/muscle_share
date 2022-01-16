<?php

use Illuminate\Database\Seeder;

class PersonalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('personals')->insert([
        [

            'weight' => '60',
            'date_key' => '2021-01-02',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '61',
            'date_key' => '2021-01-03',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '62',
            'date_key' => '2021-01-04',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-05',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-06',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-07',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-08',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-09',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '64',
            'date_key' => '2021-01-10',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-11',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-12',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [

            'weight' => '63',
            'date_key' => '2021-01-13',
            'user_id' =>"1",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
    ]);
    }
}
