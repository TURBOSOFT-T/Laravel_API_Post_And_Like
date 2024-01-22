<?php

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
      
    	foreach (range(1,20) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => $faker->address,
                
                
            ]);
        }
    
    }
}

/////  php artisan db:seed --class=CompanySeeder
