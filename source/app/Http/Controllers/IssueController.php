<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Area;
use App\Http\Requests\GetIssueOfAreaRequest;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(GetIssueOfAreaRequest $request){
        $areaID = $request->input('areaID');
        $role = $request->input('role');
        $area = Area::findOrFail($areaID);
        $issues = Issue::where('areaID',$areaID)->available()->get();
        return view('_partials.issues.lists',  compact('issues','area','role'))->render();
    }

    public function show(Request $request, $id){
        $issue = Issue::find($id);
        $role = $request->input('role');
        $currentIssue = Issue::find($id);
        return view('_partials.issues.show',  compact('currentIssue', 'role'));
    }

    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);

        $issue->state = -1;
        $issue->ownerDatetime = date('Y-m-d');

        $issue->save();

        return response()->json($issue);
    }
}
