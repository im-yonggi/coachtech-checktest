<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => rand(1,2),
            'email' => $this->faker->email,
            'postcode' => $this->faker->regexify('[0-9]{3}-[0-9]{4}'),
            // postcodeをそのまま使用するとハイフンなしになるため、regexifyを使用し、3桁-4桁の文字列を表現
            'address' => $this->faker->streetAddress,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText($maxNBChars = 120, $indexSize = 4),
            'created_at' => $this->faker->datetime($max = 'now', $timeZone = date_default_timezone_get()),
            'updated_at' => $this->faker->datetime($max = 'now', $timeZone = date_default_timezone_get()),
        ];
    }
}
