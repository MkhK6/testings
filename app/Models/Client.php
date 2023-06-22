<?php

namespace App\Models;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function wallet()
    {
        return $this->hasMany(Wallet::class);
    }
}
