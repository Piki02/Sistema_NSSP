<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'previous_name',
        'built_year',
        'built_by',
        'hydrostatic_by',
        'call_letters',
        'shpyard_no',
        'hull_no',
        'dated_at',
        'registry_port',
        'flag',
    ];

    public function crewMembers()
    {
        return $this->hasMany(CrewMember::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
