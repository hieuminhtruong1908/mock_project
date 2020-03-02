<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Content;
use App\Http\Requests\CreateContentRequest;
use Auth;

class ContentController extends Controller
{
    public function list($idGroup)
    {
        $data['group'] = Group::find($idGroup);
        return view('group.pages.content', $data);
    }

    public function add(CreateContentRequest $request, $idGroup)
    {
        $group = Group::find($idGroup);
        $content = new Content();
        $content->title = $request->conten;
        $content->content = $request->description;
        $content->level = $request->level;
        $content->start_date = $request->start;
        $content->end_date = $request->end;
        $content->author = Auth::user()->id;
        $content->group_id = $group->id;
        $content->save();

        return redirect()->back()->with('notify', 'tạo content thành công');
    }
}
