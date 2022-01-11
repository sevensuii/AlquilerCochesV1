<?php

namespace Database\Factories;

use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Coche;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlquilerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alquiler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'cliente_id' => Cliente::inRandomOrder()->first()->id,
            'coche_id' => Coche::inRandomOrder()->first()->id,
            'f_reserva' => $this->faker->date(),
            'f_recogida' => $this->faker->date(),
            'f_devolucion' => $this->faker->date(),
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'combustible_recogida' =>$this->faker->numberBetween($min = 10, $max = 90),
            'combustible_devolucion' =>$this->faker->numberBetween($min = 10, $max = 90),
        ];
    }
}
