<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\{ Film, Category, Actor, Beat, Like, Post};

use App\Models\{ User, Company,Project,Task};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{


     public function run()
    {


        $user = User::create([
            'name' => 'Thomas',

            'email' => 'thomastuemo@gmail.com',

           // 'role' => 'admin',
            // 'status' => 'instructor',
            'password' => bcrypt('123456789')

        ]);
        $user = User::create([
            'name' => 'Thomas',

            'email' => 'tuemothomas@gmail.com',


            'password' => bcrypt('123456789')

        ]);

    \App\Models\User::factory(5)->create();
        $nbrUsers = 7;

  Post::withoutEvents(function () {
            foreach (range(1, 2) as $i) {
                Post::factory()->create([
                    'title' => 'Post ' . $i,
                    'slug' => 'post-' . $i,

                    'user_id' => 2,

                ]);
            }
            foreach (range(3, 9) as $i) {
                Post::factory()->create([
                    'title' => 'Post ' . $i,
                    'slug' => 'post-' . $i,

                    'user_id' => 3,

                ]);
            }
        });


        Beat::withoutEvents(function () {
            foreach (range(1, 2) as $i) {
                Beat::factory()->create([
                    'title' => 'Beat ' . $i,
                    'slug' => 'beat-' . $i,

                    'user_id' => 2,

                ]);
            }
            foreach (range(3, 9) as $i) {
                Beat::factory()->create([
                    'title' => 'Beat ' . $i,
                    'slug' => 'beat-' . $i,

                    'user_id' => 3,

                ]);
            }
        });
        $nbrBeat = 9;


        $beats = Beat::all();
        $users = User::all();
        $posts = Post::all();


            foreach ($beats as $beat) {
                Like::create([
                    // 'user_id' => $user->id,
                    'user_id' => User::all()->random()->id,
                    'likeable_id' => $beat->id,
                    'likeable_type' => 'App\Models\Beat',
                ]);
            }

            foreach ($posts as $post) {
                Like::create([
                    // 'user_id' => $user->id,
                    'user_id' => User::all()->random()->id,
                    'likeable_id' => $post->id,
                    'likeable_type' => 'App\Models\Post',
                ]);
            }
        




    }
}