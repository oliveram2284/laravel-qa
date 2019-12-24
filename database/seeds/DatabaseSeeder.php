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
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,10)->create()->each(function($u){
            $u->questions()
            ->saveMany(
                factory(App\Question::class,rand(1,20))->make()
            )
            ->each(function($q){
                $q->answers()->saveMany(
                    factory(App\Answer::class, rand(1,50))->make()
                );
            });
        });
        
    }
}
