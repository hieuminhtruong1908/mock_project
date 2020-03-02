<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function profile()
    {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function update($id, UpdateProfile $request)
    {
        $validation = $request->validated();

        if ($validation) {
            $user = User::find($id);
            $user->avatar = $this->storeImage($request, $user);
            if(!$user->avatar){
                $user->avatar = "user_login.png";
            }
            $user->name = $request->name;
            $user->nickname = $request->nickname;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date));
            $user->info = $request->info;
            $user->save();

            return response()->json([
                'message' => 'Update Successfully',
                'class_name' => 'alert-success',
                'src_img' => $user->avatar
            ], 200);
        }

        return response()->json(['message' => $validation->errors()->first(), 'class_name' => 'alert-danger'],
            200); //error
    }

    public function storeImage(Request $request, $user)
    {
        if ($request->hasFile('file')) {
            unlink('source/img/user/' . $user->avatar);
            $avatar = $request->file('file');
            $avatarExtension = $avatar->getClientOriginalExtension();
            $nameImage = time() . str_replace(" ", "_", $user->name) . '.' . $avatarExtension;
            $avatar->move('source/img/user', $nameImage);
            return $nameImage;
        }
        if ($user->avatar){
            return $user->avatar;
        }
        return "";
    }
}
