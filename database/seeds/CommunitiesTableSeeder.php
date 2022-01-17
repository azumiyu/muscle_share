<?php

use Illuminate\Database\Seeder;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('communities')->insert([
        [
            'name' => 'test',
            'target' => '頑張ろう',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'test2',
            'target' => '頑張ろう',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'test3',
            'target' => '頑張ろう',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
            'name' => 'test4',
            'target' => '頑張ろう',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ],
    ]);
    }
}
