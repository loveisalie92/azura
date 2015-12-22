<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Http\Requests\GetIssueOfAreaRequest;

class IssueController extends Controller
{
    public function index(GetIssueOfAreaRequest $request){
        $areaID = $request->input('areaID');
        $issues = Issue::where('areaID',$areaID)->get();
        return view('_partials.issues.rows',  compact('issues'))->render();
    }
}