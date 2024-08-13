<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert(
            [
                'user_id'=>1,
                'title'=>'東京喰種',
                'body'=>'面白い',
                'category_id'=> '1',
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                // 'deleted_at'=>new DateTime(),
            ],
            
        );
            
         DB::table('posts')->insert(
            
            [
                'user_id'=>1,
                'title'=>'東京喰種re',
                'body'=>'これも面白い',
                'category_id'=> '1',
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                // 'deleted_at'=>new DateTime(),
            ],
        );
    }
}
