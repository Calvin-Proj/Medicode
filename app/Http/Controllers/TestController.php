<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usertypes.lecturer.managetests');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTests(Request $request, Test $test)
    {
        $data = $test->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditTestData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteTestModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
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
            'test_type' => 'required',
            'test_desc' => 'required',
            'test_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test->storeData($request->all());

        return response()->json(['success'=>'Test added successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = new Test;
        $data = $test->findData($id);

        $html = '<div class="text-gray-600" value="'.$data->test_date.'>
                <div class="form-group flex justify-start p-2 text-white">
                    <label for="test_date">Test Date:</label>
                    <span class="w-14"></span>
                    <input type="date" class="text-primary" name="test_date" id="test_date value="'.$data->test_time.'">
                </div>
                <div class="form-group flex justify-start p-2 text-white" >
                    <label for="test_time">Test Time:</label>
                    <span class="w-8"></span>
                    <span class="w-8"></span>
                    <input type="time" class="text-primary" name="test_time" id="test_time value="'.$data->test_time.'">
                </div>
                <div class="form-group">
                    <label for="test_type">Test Type:</label>
                    <input type="checkbox" class="form-control" name="test_type" id="Edittest_type" value="'.$data->test_type.'">
                </div>
                <div class="form-group">
                    <label for="test_desc">Test Description:</label>
                    <textarea class="form-control" name="test_desc" id="editTest_desc">'.$data->test_desc.'
                    </textarea>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'test_date' => 'required',
            'test_type' => 'required',
            'test_desc' => 'required',
            'test_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $test = new Test;
        $test->updateData($id, $request->all());

        return response()->json(['success'=>'Test updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = new Test;
        $test->deleteData($id);

        return response()->json(['success'=>'Test deleted successfully']);
    }
}
