<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=0; $i < 30; $i++) { 
            $c = Category::inRandomOrder()->first();

            $title = Str::random(20);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "<p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur minima cum perferendis corporis obcaecati possimus distinctio quaerat, asperiores modi voluptatem non facilis officiis velit ut libero deserunt. Quo, minus modi!,</p>",
                'category_id' => $c->id,
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur",
                'posted' => "yes"
            ]);
        }
        
    }
}
