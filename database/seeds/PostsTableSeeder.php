<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('posts')->insert([
        [
            'id' => '1',
            'weight' => '100',
            'rep' => '5',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '1',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '2',
            'weight' => '90',
            'rep' => '5',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '3',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '3',
            'weight' => '90',
            'rep' => '5',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '4',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '4',
            'weight' => '80',
            'rep' => '5',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '1',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '5',
            'weight' => '80',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '5',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '6',
            'weight' => '95',
            'rep' => '7',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '5',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '7',
            'weight' => '95',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '2',
            'workout_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '8',
            'weight' => '95',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '2',
            'workout_id' => '1',
            'created_at' => date('2022-02-01 09:00:00'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '9',
            'weight' => '70',
            'rep' => '4',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '1',
            'workout_id' => '1',
            'created_at' => date('2022-02-01 09:00:00'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '10',
            'weight' => '70',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '3',
            'workout_id' => '1',
            'created_at' => date('2022-02-01 09:00:00'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '11',
            'weight' => '60',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '4',
            'workout_id' => '1',
            'created_at' => date('2022-02-01 09:00:00'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'id' => '12',
            'weight' => '60',
            'rep' => '3',
            'set' => '3',
            'comment' => 'test',
            'user_id' => '5',
            'workout_id' => '1',
            'created_at' => date('2022-02-01 09:00:00'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
        
    ]);
    }
}
