<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            UserTableSeeder::class,
            TaskTableSeeder::class
        ]);
//         $this->call(TaskTableSeeder::class);
//         $this->call(UserTableSeeder::class);
    }
}
