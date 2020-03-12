<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new App\User();
        $user->password = Hash::make('RedTagRocks2019');
        $user->email = 'mmarcell@redtag.digital';
        $user->name = 'Mylon';
        $user->role = 'admin'; 
        $user->save();
    }
}
