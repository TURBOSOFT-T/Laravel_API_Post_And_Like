<?php

namespace Database\Seeders;
use App\Models\{ User, Project, Task };
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




use Faker\Factory as Faker;






class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    /* public function run()
    {
      \App\Models\User::factory(20)->create();
      //\App\Models\Company::factory(10)->create();
     // factory(App\Company::class, 20)->create();

      
     

   }*/

     public function run()
    {
        $faker = Faker::create();


       \App\Models\User::factory(5)->create();
       
     
        
     //   $gender = $faker->randomElement(['male', 'female']);

    	//foreach (range(1,2) as $index) {
           // DB::table('projects')->insert([
           //     'name' => $faker->name
              //  'user_id'=>$faker->rand(1,5)
              //  'email' => $faker->email,
               // 'address' => $faker->address
              //  'phone' => $faker->phoneNumber,
                //'dob' => $faker->date($format = 'Y-m-d', $max = 'now')
          //  ]);
      //  }
    } 
}
