<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Area;
use App\Http\Requests\GetIssueOfAreaRequest;

class IssueController extends Controller
{
    public function index(GetIssueOfAreaRequest $request){
        $areaID = $request->input('areaID');
        $area = Area::findOrFail($areaID);
        $issues = Issue::where('areaID',$areaID)->available()->get();
        return view('_partials.issues.lists',  compact('issues','area'))->render();
    }

    public function show($id){
        $issue = Issue::find($id);
        $currentIssue = Issue::find($id);
        return view('_partials.issues.show',  compact('currentIssue'));
    }
}
