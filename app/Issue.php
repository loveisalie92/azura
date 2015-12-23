<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    const DELETE_STATE = -1;
    const WAITING_STATE = 0;
    const COMPLETE_STATE = 1;

    protected $primaryKey = 'ID';
    protected $table = 'issues';

    //protected $dates = ['completedAt', 'createDatetime', 'ownerDatetime', 'builderDatetime'];

    protected $fillable = [
        'areaID', 'photo', 'ownerComment', 'solution', 'builderComment',
        'state', 'completedAt', 'createDatetime', 'ownerDatetime',
        'builderDatetime'
    ];

    public $timestamps = false;
    
    public function scopeAvailable($query)
    {
        return $query->where('state', '!=',self::DELETE_STATE);
    }
}
