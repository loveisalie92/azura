<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Http\Requests\GetIssueOfAreaRequest;

class IssueController extends Controller
{
    public function index(GetIssueOfAreaRequest $request){
        $areaID = $request->input('areaID');
        $issues = Issue::where('areaID',$areaID)->get();
        return view('_partials.issues.lists',  compact('issues','areaID'))->render();
    }
    
    public function show($id){
        $currentIssue = Issue::find($id);
        return view('_partials.issues.show',  compact('currentIssue'));
    }
}