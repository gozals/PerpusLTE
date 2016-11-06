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

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('editor')
        ]);
        User::create([
            'name' => 'member',
            'email' => 'member@member.com',
            'password' => bcrypt('member')
        ]);

        $faker = \Faker\Factory::create();
        foreach(range(1,10) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password
            ]);
        }
    }
}
