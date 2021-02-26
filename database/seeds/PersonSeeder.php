<?php declare(strict_types=1);

use App\Person;
use App\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PersonSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('people')
            ->truncate();
        Schema::enableForeignKeyConstraints();

        factory(Person::class, 50)
            ->create()
            ->each(function(Person $person) {
                $team = \App\Team::inRandomOrder()->first();
                $person->teams()->attach($team->id);
            });

        $person = new Person();
        $person->name = 'Zaphod Beeblebrox';
        $person->user_id = 1;
        $person->timezone = 'Europe/Dublin';
        $person->uuid = Uuid::uuid4();
        $person->save();
        $person->teams()->attach(1);
    }
}
