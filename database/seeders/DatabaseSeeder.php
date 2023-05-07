<?php

namespace Database\Seeders;
require('app/helpers.php');

use App\Models\Crypto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function create_user()
{
    $user = User::create([
        'name' => 'Test',
        'email' => 'test@test.com',
        'password' => Hash::make('12341234'),
    ]);
}

function create_sample_cryptos()
{
    $crypto1 = Crypto::create([
        'name' => 'Bitcoin',
        'acronym' => 'BTC'
    ]);
    $crypto2 = Crypto::create([
        'name' => 'Ethereum',
        'acronym' => 'ETH'
    ]);
    $crypto3 = Crypto::create([
        'name' => 'Cardano',
        'acronym' => 'ADA'
    ]);
    $crypto4 = Crypto::create([
        'name' => 'XRP',
        'acronym' => 'XRP'
    ]);
    $crypto5 = Crypto::create([
        'name' => 'Dogecoin',
        'acronym' => 'DOGE'
    ]);
}

function create_admin_user()
{
    $user = User::create([
        'name' => env('ADMIN_NAME'),
        'email' => env('ADMIN_EMAIL'),
        'password' => Hash::make(env('ADMIN_PASSWORD'))
    ]);

    $adminRole = Role::create(['name' => 'admin']);

    $user->assignRole($adminRole);



    return $user;
}

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        create_user();

        create_sample_cryptos();

        create_admin_user();
    }
}
