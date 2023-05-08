<?php

namespace Database\Seeders;
require('app/helpers.php');

use App\Models\Crypto;
use App\Models\Deposit;
use App\Models\User;
use Carbon\Carbon;
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
        'acronym' => 'BTC',
        'logo' => 'https://cryptologos.cc/logos/bitcoin-btc-logo.png?v=025'
    ]);
    $crypto2 = Crypto::create([
        'name' => 'Ethereum',
        'acronym' => 'ETH',
        'logo' => 'https://cryptologos.cc/logos/ethereum-eth-logo.svg?v=025'
    ]);
    $crypto3 = Crypto::create([
        'name' => 'Cardano',
        'acronym' => 'ADA',
        'logo' => 'https://cryptologos.cc/logos/cardano-ada-logo.png?v=025'
    ]);
    $crypto4 = Crypto::create([
        'name' => 'XRP',
        'acronym' => 'XRP',
        'logo' => 'https://cryptologos.cc/logos/xrp-xrp-logo.png?v=025'
    ]);
    $crypto5 = Crypto::create([
        'name' => 'Dogecoin',
        'acronym' => 'DOGE',
        'logo' => 'https://cryptologos.cc/logos/dogecoin-doge-logo.png?v=025'
    ]);
}

function create_sample_deposits() {
    for ($i = 0; $i < 10; $i++) {
        Deposit::create([
            'amount' => rand(0,1000),
            'crypto_id' => rand(1,5),
            'quantity' => mt_rand() / mt_getrandmax(),
            'date' => '2023-05-05',
            'user_id' => 1
        ]);
    }
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

        create_sample_deposits();
    }
}
