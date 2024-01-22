<?php
namespace Database\Factories;
use App\Models\Actor;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ActorFactory extends Factory
{
    protected $model = Actor::class;
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}