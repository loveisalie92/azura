<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    protected $dates = ['completedAt', 'createDatetime', 'ownerDatetime', 'builderDatetime'];

    protected $fillable = [
        'areaId', 'photo', 'ownerComment', 'solution', 'builderComment',
        'state', 'completedAt', 'createDatetime', 'ownerDatetime',
        'builderDatetime'
    ];
}
