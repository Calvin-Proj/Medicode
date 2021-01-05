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

        $html = '<div class="form-group">
                    <label for="test_date">Test Date:</label>
                    <input type="text" class="form-control" name="test_date" id="Edittest_date" value="'.$data->test_date.'">
                </div>
                <div class="text-gray-600" value="'.$data->test_time.'>
                <select name="hours" class="outline-none border-none px-7 appearance-none">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                :
                <select name="minutes" class="outline-none border-none px-6 appearance-none">
                  <option value="0">00</option>
                  <option value="15">15</option>
                  <option value="30">30</option>
                  <option value="45">45</option>
                </select>
                <select name="ampm" class="outline-none border-none px-6 appearance-none ">
                  <option value="am">AM</option>
                  <option value="pm">PM</option>
                </select>
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
