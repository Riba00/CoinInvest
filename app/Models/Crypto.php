<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\DeclareDeclare;

class Crypto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym',
        'logo'
    ];

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function getCurrencyEurPrice()
    {
        $apiKey = env('COIN_MARKET_CAP_API_KEY'); // Reemplaza con tu propia API key

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';

        $client = new Client();

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'X-CMC_PRO_API_KEY' => $apiKey,
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'symbol' => $this->acronym,
                    'convert' => 'EUR'
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['data'][$this->acronym])) {
                $currencyPrice = $data['data'][$this->acronym]['quote']['EUR']['price'];
                return number_format($currencyPrice, 2);
            } else {
                return 'Crypto not found';
            }
        } catch (\Exception $e) {
            // Manejo de errores
            return 'Error getting crypto price';
        }
    }
}
