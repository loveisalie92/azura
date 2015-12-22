<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Issue;
use Event;

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
        $a = Area::findOrNew(1);
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
        $data = [
            'ID' => $id,
            'ownerComment' => $request->input('ownerComment')
        ];
        $issue = Issue::findOrFail($id);
        if(!$request->has('complete')) {
            $issue->fill($data);
            $issue->save();
        }
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
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = time().$file->getClientOriginalName();

            $filePath = config('web.uploadPath').$fileName;

            $file->move(config('web.uploadPath'), $fileName);
            $data = [
                'areaID' => $id,
                'photo' => $filePath,
                'ownerComment' => 'Not commend Yet'
            ];

            Issue::create($data);

            $currentIssue = Issue::orderBy('ID', 'DESC')->first();

            $areaID = $id;

            return view('_partials.issues.show', compact('areaID', 'currentIssue'));
        }


    }
}
