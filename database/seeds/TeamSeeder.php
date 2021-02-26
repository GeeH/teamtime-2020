<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Team::truncate(); // for Ocramius
        Schema::disableForeignKeyConstraints();

        $team = new \App\Team();
        $team->id = 1;
        $team->name = 'Default';
        $team->save();

        \App\Team::factory()
            ->count(5)
            ->create();
    }
}
