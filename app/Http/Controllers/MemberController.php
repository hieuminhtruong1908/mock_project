<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function list(){
        
        return view('group.pages.member.list');
    }

}
