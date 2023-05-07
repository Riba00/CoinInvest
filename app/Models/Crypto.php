<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
