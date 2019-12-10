<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('post_category')->insert([
            'post_id'=>App\Post::all()->random()->id,
            'category_id'=>App\Category::all()->random()->id,
            ]);
        }
    }
}
