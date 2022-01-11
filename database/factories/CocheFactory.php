<?php

namespace Database\Factories;

use App\Models\Coche;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CocheFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coche::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->vehicleArray();

        return [
            //
            'marca' =>$v['brand'],
            'modelo' =>$v['model'],
            'combustible' =>$this->faker->vehicleFuelType(),
            'año' =>$this->faker->biasedNumberBetween(1969,2021, 'sqrt'),
            'matricula' =>$this->faker->vehicleRegistration('[0-9]{4}-[A-Z]{3}'),

        ];
    }
}
