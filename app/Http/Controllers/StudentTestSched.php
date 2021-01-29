<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class StudentTestSched extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usertypes.student.testsched');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTests(Request $request, Test $test)
    {
        $data = $test->getStudData();
        return \DataTables::of($data)
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        $validator = \Validator::make($request->all(), [
            'test_date' => 'required',
            'test_time' => 'required',
            'test_type' => 'required',
            'test_desc' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test->storeData($request->all());

        return response()->json(['success'=>'Test added successfully']);
    }
}
