<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'typ_id' => '1',
            'use_cpf_cnpj' => '12345',
            'use_mail' => $this->faker->unique()->safeEmail,
            'use_name'  =>  $this->faker->name,
            'password' => app('hash')->make('secret123')
        ];
    }
}
