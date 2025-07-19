<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $fillable = [
    'file_id',
    'log_date',
    'time',
    'activity',
    'description'
    ];


    public function file()
    {
        return $this->belongsTo(File::class);
    }
}

