<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCourse;
use Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use DateTime;
use App\Http\Requests\AddCourseRequest;


class CourseController extends Controller
{
    public function list()
    {
        return view('course.list');
    }

    public function create(AddCourseRequest $request)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data = new Course;
        $data->name = $request->course;
        $data->description = $request->description;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back()->with("smg", "Add thành công!!");
    }

    public function edit(EditCourse $request, $id)
    {
        $validation = $request->validated();
        if ($validation) {
            $course = Course::where([
                ['id', '<>', $id],
                ['name', $request->name]
            ])->get()->first();

            if ($course) {

                return response()->json(['message' => "Course is exists"], 200);
            }
            try {
                $course = Course::findOrFail($id);
                $course->name = $request->name;
                $course->description = $request->desciption;
                $course->save();
                return redirect()->route('home')->with([
                    'message' => "Edit Course Successfully",
                    "alert" => "alert-success"
                ]);

            } catch (\ModelNotFoundException  $e) {
                return redirect()->back()->withErrors("Have an error occurred!")->withInput();
            }
        }

        return response()->json(['message' => $validation->errors()->first()], 200);
    }
}
