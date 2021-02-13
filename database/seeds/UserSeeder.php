<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $user = new \App\User();
        $user->name = 'Gary Hockin';
        $user->email = 'ghockin@twilio.com';
        $user->password = Hash::make('gary');
        $user->save();

        $user = new \App\User();
        $user->name = 'Grumpy Chris';
        $user->email = 'grmpyprogrammer@twitter.com';
        $user->password = Hash::make('grumpy');
        $user->save();
    }
}
