<?php

use Illuminate\Database\Seeder;

class Time extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(__DIR__ . './../dumps/timezonedb.sql'));
    }
}
