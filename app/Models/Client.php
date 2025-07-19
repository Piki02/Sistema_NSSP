<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'terminal', 'contact_name', 'email', 'phone', 'address'
    ];
}

