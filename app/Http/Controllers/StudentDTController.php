<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentDTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudents(Request $request, User $student)
    {
        $data = $student->getStudentData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button class="btn btn-success btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getEditStudentData" data-id="'.$data->id.'">Edit</button>
                    <button data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteStudentModal" class="btn btn-danger btn-sm px-2 py-1 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function edit($id)
    {
        $student = new User;
        $data = $student->findData($id);

        $html = '<div class="flex text-white p-2">
                    <label for="student_name">Student Name:</label>
                    <span class="w-14"></span>
                    <input type="text" name="student_name1" id="student_name1" value="'.$data->student_name.'" class="text-gray-600 w-38">
                </div>
                <div class="flex text-white p-2">
                    <label for="student_email">Student Email:</label>
                    <span class="w-14"></span>
                    <input type="text" name="student_email1" id="student_email1" value="'.$data->student_email.'" class="text-gray-600">
                </div>';
        return response()->json(['html'=>$html]);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $student = new User;
        $student->updateData($id, $request->all());

        return response()->json(['success'=>'Student updated successfully']);
    }

    public function destroy($id)
    {
        $student = new User;
        $student->deleteData($id);

        return response()->json(['success'=>'Student deleted successfully']);
    }
}
