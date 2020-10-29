<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use App\User;

use App\Project;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateImg(Request $request, $id)
    {
        
        $this->validate(request() ,[
            
            'avatar' => 'image|nullable|max:1999'
        ]);

        if(request()->hasFile('avatar')){
            //Get filename with extention
            $filenameWithExt = request()->file('avatar')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extention = request()->file('avatar')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            //Upload Image
            $path = request()->file('avatar')->storeAs('public/cover_images', $fileNameToStore);
        }

        DB::table('users')->where('id', auth()->id())->update([
            'avatar' => $img = request()->hasFile('avatar') 
            ? $fileNameToStore : $img = User::where('id', $id)->first()->avatar,
        ]);

        return back();
        
    }
    public function update(Request $request, $user)
    {

        $this->validate(request() ,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['unique:users,email,'.auth()->id().'|email|required'],
            'summary' => ['max:5000'],
            'occupation' => ['max:255'],
            'profile' => Rule::in(["Company", "Start up", "Investor", "Person", " "]),
            'url' => ['url', 'nullable'],
            'country' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            
        ]);

        DB::table('users')->where('id', auth()->id())->update([
            'name' => request('name'),
            'email' => request('email')
        ]);

        \App\ProfileExtention::updateOrCreate(
            ['user_id' => auth()->id()],
            ['summary' => request('summary'),
            'occupation' => request('occupation'),
            'profile' => request('profile'),
            'website' => request('url'),
            'country' => request('country'),
            'city' => request('city'),
            ]
        );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
