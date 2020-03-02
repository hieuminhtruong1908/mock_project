<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'asc')->orderBy('name', 'asc')->get();

        return view('pages.home', compact('courses'));
    }

    public function home()
    {

        $roles = Role::where('user_id',Auth::user()->id)->with(['group:id,name'])->get();


        $courses = Course::orderBy('created_at', 'asc')->orderBy('name', 'asc')->get();

        return view('pages.home', compact( 'courses','roles'));
    }

}
