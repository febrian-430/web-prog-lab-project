<?php

namespace App\Http\Controllers;

use App\Member;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::paginate(10);
        return view('member.master')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|confirmed|min:6|alpha_num',
            'password_confirmation' => 'required|min:6|alpha_num',
            'gender' => 'required|in:Male, Female',
            'address' => 'required',
            'birthday' => 'required|date',
            'profile_picture' => 'required|mimes:jpeg,png,jpg'
        ];
        $this->validate($request, $validation);

        $photo = $request->file('profile_picture');
        $photo_name = Uuid::uuid(). '.' . $photo->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images');
        $photo->move($storage_destination, $photo_name);

        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->birthday = $request->birthday;
        $member->profile_picture = $photo_name;
        $member->role = "Member";
        $member->save();
        
        return view('registration', [
            'success' => 'Registration completed'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
