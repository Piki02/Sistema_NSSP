<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = false; // ← ESTA ES LA CLAVE

    protected $fillable = [
        'file_number',
        'client_id',
        'vessel_id',
        'operation_type',
        'quantity',
        'product',
        'terminal',
        'port',
        'status',
        'movement',
        'start_date',
        'end_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }
    public function timeLogs()
    {
    return $this->hasMany(TimeLog::class);
    }

}
