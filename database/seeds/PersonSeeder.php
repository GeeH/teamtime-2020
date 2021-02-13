<?php declare(strict_types=1);

use App\Person;
use App\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PersonSeeder extends Seeder
{
    public function run()
    {
        DB::table('people')
            ->truncate();

        factory(Person::class, 10)
            ->create();

        $person = new Person();
        $person->name = 'Zaphod Beeblebrox';
        $person->user_id = 1;
        $person->timezone = 'Europe/Dublin';
        $person->uuid = Uuid::uuid4();
        $person->save();
    }
}
