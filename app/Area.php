<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

   
    protected $table = 'areas';

    protected $fillable = ['name'];

    public $timestamps = false;
    
    public static function getAreasWithWaitingIssues(){
        $waitingStatus = intval(Issue::WAITING_STATE);
        $countIssue = "(SELECT COUNT(`issues`.`ID`) FROM issues WHERE `issues`.`areaID` = `areas`.`ID` AND `issues`.`state` = $waitingStatus)";
        return Area::select(DB::raw("areas.*,$countIssue as `issuesCount`"))->get();
    }
    
    public function getStringNameAttribute(){
        return ucfirst(str_replace('-',' ',$this->name));
    }
    
    public function issues(){
        return $this->hasMany('App\Issue','areaID',"ID");
    }
}
