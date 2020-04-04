<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'id' => 1,
            'username' => 'ABCNews',
            'email' => 'lieseltareddit@gmail.com',
            'reddit' => false,
            'banned' => false,
            'journalist' => true,
            'administrator' => true,
            'can_tweet' => true,
            'password' => bcrypt('coolgardie'),
        ]);

        \Illuminate\Support\Facades\DB::table('settings')->insert([
            'id' => 1,
            'breaking_news_enabled' => false
        ]);
    }
}
