<?php

namespace Database\Factories;

use App\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;
    protected int $invokeCount = -1;
    protected $teams = [
        'Friends', 'Work', 'Charity', 'Open Source', 'Other',
    ];

    public function definition(): array
    {
        $this->invokeCount++;
        return [
            'name' => $this->teams[$this->invokeCount] ?? $this->faker->word()
        ];
    }
}
