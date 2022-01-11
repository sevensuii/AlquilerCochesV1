<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre' =>$this->faker->firstName(),
            'apellidos' =>$this->faker->lastName(),
            'dni' =>$this->faker->dni(),
            'correo' =>$this->faker->email(),
            'direccion' =>$this->faker->address(),
            'f_nac' =>$this->faker->date()
        ];
    }
}
