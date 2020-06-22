<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'movie_id' => \Webpatser\Uuid\Uuid::generate(),
            'movie_name' => str_random(10),
            'start_date' => '20200702',
            'end_date' => '20200729',
            'description' => str_random( 10 ),
            'create_user_id' => '1',
            'update_user_id' => '1',
        ]);
    }
}
