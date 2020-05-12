<?php declare(strict_types=1);

use App\Person;
use App\User;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        DB::table('people')
            ->truncate();

        factory(Person::class, 100)
            ->create();
    }
}
