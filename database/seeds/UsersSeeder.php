<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=factory(\App\Models\User::class,20)
            ->create()
            ->each(function ($user) {
                $user->providers()
                    ->createMany(
                        factory(\App\Models\Provider::class, 5)->make()->toArray()
                    );
            });
    }
}
