<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_sites')->insert([
            'name' => 'youtube',
            'url' => 'https://www.youtube.com/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('web_sites')->insert([
            'name' => 'news',
            'url' => 'https://news.am/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('web_sites')->insert([
            'name' => 'google',
            'url' => 'https://www.googleapis.com/blogger/v3/blogs/2399953/posts/6069922188027612413/comments',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
