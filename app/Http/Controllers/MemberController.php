<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        $data = Member::all();

        return view('memberTable', [
            'members' => $data
        ]);
    }

    public function createMemberForm()
    {

        return view('create-member');
    }

    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'age' => ['required', 'integer'],
                'address' => 'required',
                'phone' => 'required',
                'password' => ['required','min:8'],
            ]
        );

        $expiry_date = date("Y-m-d", strtotime('+30 days'));
        $password = Hash::make($request->password);
        

        // Member::create([
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'expiry_date' => $expiry_date,
        //     'password' => $password,
        // ]);

        $user = new Member();
        $user->name = $request->name;
        $user->age =$request->age;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->expiry_date = $expiry_date;
        $user->password = $password;
        $user->save();

        return back()->with('message', 'new member is Added!');
    }

    public function editMemberForm($id)
    {
        $data = Member::find($id);
        return view('edit-member-form', [
            'member' => $data,

        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'age' => ['required', 'integer'],
                'address' => 'required',
                'phone' => 'required',
                'expiry_date' => 'required',
            ]
        );

        $member = Member::find($id);

        $member->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone' => $request->phone,
            'expiry_date' => $request->expiry_date
        ]);

        return back()->with('message', 'Member is Updated!');
    }

    public function delete($id)
    {
        $book = Member::find($id)->delete();

        return back()->with('message', 'Member is Deleted!');
    }

    public function ban($id)
    {
        $member = Member::find($id)->update([
            'status' => 1
        ]);
       

     

        return back()->with('message', 'Member is Banned!');
    }

    public function unban($id)
    {
        $member = Member::find($id);
        $member->update([
            'status' => '0'
        ]);

        return back()->with('message', 'Member is Unbanned!');
    }
}
