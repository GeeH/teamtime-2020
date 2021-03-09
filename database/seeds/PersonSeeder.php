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

        Person::create('Zaphod Beeblebrox', 'Europe/Dublin', 1, ['Other']);

        Person::create('Valeriane Venance', 'Europe/Paris', 1, ['Work']);
        Person::create('Devin Rader', 'America/New_York', 1, ['Work']);
        Person::create('Alina Rakhmatoullina', 'America/Chicago', 1, ['Work']);
        Person::create('Troy Blanchard', 'America/Los_Angeles', 1, ['Work']);
        Person::create('Phil Nash', 'Australia/Melbourne', 1, ['Work']);

        Person::create('Matthew Weier O\'Phinney', 'America/Mexico_City', 1, ['Community']);
    }
}
