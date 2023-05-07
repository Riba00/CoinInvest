<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'quantity',
        'crypto_id',
        'date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crypto()
    {
        return $this->belongsTo(Crypto::class);
    }

    public function getFormattedQuantity()
    {
        $quantity = (string) $this->quantity;

        return number_format($quantity, strlen($quantity));
    }

    public function getFormattedDate()
    {
        return Carbon::parse($this->date)->format('d-m-Y');
    }

    public function getFormattedAmount()
    {
        return number_format($this->amount, 2, ',', '.');

    }




}
