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
