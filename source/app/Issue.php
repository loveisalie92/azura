<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $primaryKey = 'ID';
    protected $table = 'issues';

    protected $dates = ['completedAt', 'createDatetime', 'ownerDatetime', 'builderDatetime'];

    protected $fillable = [
        'areaID', 'photo', 'ownerComment', 'solution', 'builderComment',
        'state', 'completedAt', 'createDatetime', 'ownerDatetime',
        'builderDatetime'
    ];

    public $timestamps = false;
}
