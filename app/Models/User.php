<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function getCryptoBalance()
    {
        $totals = Deposit::select('user_id', 'crypto_id')
                        ->where('user_id', $this->id)
                        ->selectRaw('SUM(quantity) as totalQuantity, SUM(amount) as totalInvested')
                        ->groupBy('user_id', 'crypto_id')
                        ->get();
        return $totals;
    }

    public function getCryptoQuantity($id)
    {
        $totalQuantity = Deposit::where('user_id', $this->id)
                            ->where('crypto_id', $id)
                            ->selectRaw('SUM(quantity) as quantity')
                            ->groupBy('crypto_id')
                            ->get();

        return floatVal($totalQuantity[0]->quantity);
    }

    public function getCryptoAmount($id)
    {
        $totalAmount = Deposit::where('user_id', $this->id)
            ->where('crypto_id', $id)
            ->selectRaw('SUM(amount) as amount')
            ->groupBy('crypto_id')
            ->get();
        return $totalAmount[0]->amount;
    }

    public function getTotalInvested()
    {
        $total = 0;
        foreach ($this->deposits as $deposit){
            $total += $deposit->amount;
        }
        return $total;
    }
}
