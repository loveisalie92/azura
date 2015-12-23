<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    const DELETE_STATUS = -1;
    const WAITING_STATUS = 0;
    const COMPLETE_STATUS = 1;

    protected $table = 'areas';

    protected $fillable = ['name'];

    public $timestamps = false;
    
    public static function getAreasWithWaitingIssues(){
        $waitingStatus = intval(self::WAITING_STATUS);
        $countIssue = "(SELECT COUNT(`issues`.`ID`) FROM issues WHERE `issues`.`areaID` = `areas`.`ID` AND `issues`.`state` = $waitingStatus)";
        return Area::select(DB::raw("areas.*,$countIssue as `issuesCount`"))->get();
    }
    
    public function getStringNameAttribute(){
        return ucfirst(str_replace('-',' ',$this->name));
    }
}
