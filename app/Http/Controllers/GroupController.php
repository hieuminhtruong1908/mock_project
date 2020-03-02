<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategroupRequest;
use App\Http\Requests\UploadAvatar;
use App\Http\Requests\UploadCover;
use App\Models\Course;
use App\Models\Group;
use App\Models\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;


class GroupController extends Controller
{
    public function list($idCourse)
    {
        try {
            $data['course'] = Course::findOrFail($idCourse);
        } catch (ModelNotFoundException $exception) {
            return view('errors.404');
        }


        $time = Carbon::now('Asia/Ho_Chi_Minh');
        $data['course'] = Course::find($idCourse);
        $data['coming'] = Group::where([
            ['course_id', $idCourse],
            ['start_date', '>', $time->toDateString()],
        ])->with(['author:id,name'])
            ->orderBy('start_date', 'desc')
            ->orderBy('name', 'asc')
            ->get();
        $data['running'] = Group::where([
            ['course_id', $idCourse],
            ['start_date', '<', $time->toDateString()],
        ])->with(['author:id,name'])
            ->orderBy('start_date', 'desc')
            ->orderBy('name', 'asc')
            ->get();


        $data['memberCountComming'] = $this->countMember($data['coming']);
        $data['memberCountRunning'] = $this->countMember($data['running']);


        return view('group.list', $data);
    }

    public function create(CreategroupRequest $request, $idCourse)
    {
        $course = Course::find($idCourse);
        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->start_date = date('Y-m-d', strtotime($request->start_date));
        $group->creator = Auth::user()->id;
        $group->course_id = $course->id;
        $group->save();

        return back()->with('notify', 'created new group');
    }

    public function countMember($data)
    {
        $commingMember = [];
        foreach ($data as $key => $values) {
            $commingMember[$key] = 1;
            if (count(Role::where([['level', 1], ['group_id', $values->id]])->get())) {
                $commingMember[$key] = count(Role::where([['level', 1], ['group_id', $values->id]])->get())+1;
                continue;
            }
        }
        return $commingMember;
    }

    public function home($id)
    {
        try {
            $group = Group::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('errors.404');
        }

        $contents = Content::orderBy('end_date', 'desc')
            ->orderBy('start_date', 'desc')
            ->get();

        $roles = Role::where([
            ['level',1],
            ['group_id',$id]
        ])->get();


        $members = $this->getMember($roles);
        $members[] = Group::find($id)->author;

        $members = collect($members)->sortBy('name');

        $caption = false;
        if (Auth::user()->id == $group->author->id) {
            $caption = true;
        }

        return view('group.layout-detail', compact('group', 'caption','members','contents'));
    }


    public function uploadAvatar(UploadAvatar $request, $id)
    {
        $validate = $request->validated();
        if ($validate) {
            $group = Group::find($id);

            $image = $request->file('upload');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            if ($group->slug) {
                unlink('source/img/group/' . $group->slug);
            }

            $image->move('source/img/group', $nameImage);
            $group->slug = $nameImage;
            $group->save();

            return response()->json([
                'message' => "Upload successfully",
                'class_name' => 'alert-success'
            ]);
        }

        return response()->json([
            'message' => "test",
            'class_name' => 'alert-danger'
        ]);

    }


    public function uploadCover(UploadCover $request, $id)
    {
        $validate = $request->validated();
        if ($validate) {
            $group = Group::find($id);

            $image = $request->file('uploadCover');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            if ($group->thumbnail) {
                unlink('source/img/group/' . $group->thumbnail);
            }

            $image->move('source/img/group', $nameImage);
            $group->thumbnail = $nameImage;

            $group->save();

            return response()->json([
                'message' => "Upload Cover successfully",
                'class_name' => 'alert-success'
            ]);
        }

        return response()->json([
            'message' => $validate->error()->first(),
            'class_name' => 'alert-danger'
        ]);
    }

    public function getMember($roles){
        $member = [];
        foreach ($roles as $key=>$value){
            $member [] = User::find($value->user_id);
        }
        return $member;
    }
}
