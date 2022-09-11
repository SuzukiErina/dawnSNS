<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'HRI太郎',
                'mail' => 'tarou@mail.com',
                'password' => Hash::make('tarou11'),
                'bio' => 'HRI太郎の自己紹介ページ',
            ],
        ]);
    }
}
