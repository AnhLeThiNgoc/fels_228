<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class, 2)->create();
        User::find(1)->update([
            'name' => 'Ngoc Anh',
            'password' => '123456',
            'email' => 'ngocanh@gmail.com',
        ]);
        User::find(2)->update([
            'name' => 'Admin',
            'password' => '123456',
            'email' => 'admin@gmail.com',
            'role' => '1',
        ]);
    }
}
