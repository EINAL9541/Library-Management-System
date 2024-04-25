<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserMemberController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'age' => ['required', 'integer'],
                'address' => 'required',
                'phone' => 'required',
                'password' => ['required', 'min:8'],
            ]
        );

        $expiry_date = date("Y-m-d", strtotime('+30 days'));
        $password = Hash::make($request->password);

        $user = new Member();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->expiry_date = $expiry_date;
        $user->password = $password;
        $user->save();

        return back()->with('message', 'Sucessfully register!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $validated = $request->validate(
            [
                'phone' => 'required',
                'password' => 'required',
            ]
        );

        $phone = DB::select("select * from members where phone = ?", [$request->phone]);
        if (!$phone) {
            return back()->with('error', 'something wrong');
        }

        $password = $request->password;
  
        if (Hash::check($password, $phone[0]->password)) {
            
            $_SESSION['user'] = [

                'user_id' => $phone['0']->id,
                'name' => $phone['0']->name,
                'phone' => $phone['0']->phone,  
                'expiry_date' => $phone['0']->expiry_date
            ];
            return redirect('/');
        }


        return back()->with('error', 'something wrong');
    }
}
