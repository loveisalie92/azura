<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Issue;
use Carbon\Carbon;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::getAreasWithWaitingIssues();
        return view('index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        //dd($request->all());

        $issue = Issue::findOrFail($id);
        $data = $request->all();
        if($request->has('complete')) {
            $data['state'] = Issue::COMPLETE_STATE;
            $data['completedAt'] = date('Y-m-d H:i:s');
            $data['ownerDatetime'] = date('Y-m-d H:i:s');
        }
        $issue->fill($data);
        $issue->save();
        return response()->json($issue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Upload image from drag and drop
     */
    public function photoUpload(Request $request)
    {
        $id = $request->input('id');
        $role = $request->input('role');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = time().$file->getClientOriginalName();

            $filePath = config('web.uploadPath').$fileName;

            $file->move(config('web.uploadPath'), $fileName);
//            $lasterIssue = Issue::select('ID')->where('areaID',$id)->orderBy('id','DESC')->first();
//            if($lasterIssue){
//                $comment = "Issue #".$lasterIssue->ID;
//            }else{
//                $comment = "Issue #1";
//            }
            $data = [
                'areaID' => $id,
                'photo' => $filePath,
                'ownerComment' => "New issue"
            ];

            Issue::create($data);

            $currentIssue = Issue::orderBy('ID', 'DESC')->first();

            $areaID = $id;

            return view('_partials.issues.show', compact('areaID', 'currentIssue','role'));
        }


    }
}
