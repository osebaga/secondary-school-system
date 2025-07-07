<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory{

    public function definition()
    {
        return [
            'username'  =>"superadmin",
            'first_name' => $this->faker->firstName,
            'middle_name'=>$this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'type'=>'1',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),

        ];
    }
}

