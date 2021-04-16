<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $this->call(UsersSeeder::class);
            $this->call(ProvidersSeeder::class);
            $this->call(SpotsSeeder::class);
            $this->call(PaymentsSeeder::class);
    }
}
