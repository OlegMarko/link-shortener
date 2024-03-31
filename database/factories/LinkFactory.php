<?php

namespace Database\Factories;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'original_url' => $this->faker->url,
            'token' => $this->faker->unique()->regexify('[A-Za-z0-9]{8}'),
            'max_count' => $this->faker->randomNumber(2),
            'redirect_count' => 0,
            'expiration_time' => Carbon::now()
                ->addHours($this->faker->numberBetween(1, 23))
                ->addMinutes($this->faker->numberBetween(0, 59))
        ];
    }
}
