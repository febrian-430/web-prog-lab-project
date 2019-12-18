<?php

namespace App\Http\Controllers;

use App\Member;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class MemberController extends Controller
{

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $member = Auth::user();
            Auth::login($member);

            if($request->remember){
                $response = new Response(redirect()->route('home')->with('status', 'Welcome back, '. $member->name));
                $response->withCookie('USER_COOKIE', $member, 120);
                return $response;
            }
            return redirect()->route('home')->with('status', 'Welcome back, '. $member->name);
        }
        return back()->with('danger', 'Wrong email or password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    private function fetchAll(){
        return Member::paginate(10);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Self::fetchAll();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function createByAdmin()
    {
        return view('member.create');
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
            'gender' => 'required|in:Male,Female',
            'address' => 'required',
            'birthday' => 'required|date',
            'profile_picture' => 'required|mimes:jpeg,png,jpg'
        ];
        $this->validate($request, $validation);

        $photo = $request->file('profile_picture');
        $photo_name = Uuid::uuid(). '.' . $photo->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images/memberImg');
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

        Auth::login($member);

        return redirect()->route('home')->with('status', 'Welcome to our website!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeByAdmin(Request $request)
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
        $storage_destination = storage_path('/app/public/images/memberImg');
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


        return redirect()->route('memberMaster')->with('status', 'Added new member '.$member->name);
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
        return view('member.show')->with('member', $member);
    }

    public function show_self(){
        return view('member.show')->with('member', Auth::user());
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
        return view('member.edit')->with('member', $member);
    }

    public function edit_self(){
        $member = Auth::user();
        return view('member.editProfile')->with('member', $member);
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
        $validation = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:members,email,'.$member->id,
            'password' => 'required|confirmed|min:6|alpha_num',
            'password_confirmation' => 'required|min:6|alpha_num',
            'gender' => 'required|in:Male, Female',
            'address' => 'required',
            'birthday' => 'required|date',
            'profile_picture' => 'required|mimes:jpeg,png,jpg',
            'role' => 'required'
        ];
        $this->validate($request, $validation);

        unlink(storage_path('/app/public/images/memberImg/'.$member->profile_picture));

        $image = $request->file('profile_picture');
        $image_name = Uuid::uuid(). '.' . $image->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images/memberImg');
        $image->move($storage_destination, $image_name);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->birthday = $request->birthday;
        $member->profile_picture = $image_name;
        $member->role = $request->role;
        $member->save();

        return redirect()->route('memberMaster')->with('status', 'Update successful');
    }

    public function update_self(Request $request)
    {
        //
        $member = Auth::user();
        $validation = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:members,email,'.$member->id,
            'password' => 'required|confirmed|min:6|alpha_num',
            'password_confirmation' => 'required|min:6|alpha_num',
            'gender' => 'required|in:Male, Female',
            'address' => 'required',
            'birthday' => 'required|date',
            'profile_picture' => 'required|mimes:jpeg,png,jpg',
            'role' => 'required'
        ];
        $this->validate($request, $validation);

        $currentImage = $member->profile_picture;
        unlink(storage_path('/app/public/images/memberImg/'.$currentImage));

        $image = $request->file('profile_picture');
        $image_name = Uuid::uuid(). '.' . $image->getClientOriginalExtension();
        $storage_destination = storage_path('/app/public/images/memberImg');
        $image->move($storage_destination, $image_name);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->birthday = $request->birthday;
        $member->profile_picture = $image_name;
        $member->role = $request->role;
        $member->save();

        return redirect()->route('profile')->with('status', 'Update successful');
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
        $name = $member->name;
        Member::destroy($member->id);
        return redirect('memberMaster')->with('status', 'Member '.$name. ' has been deleted');
    }
}
