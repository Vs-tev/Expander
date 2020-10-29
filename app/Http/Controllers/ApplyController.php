<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Apply_body;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewApplyNotification;


class ApplyController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {
        //recieved apply separated by user

        $applyings = Apply::latest();
      
        $applyings = $applyings->where([
            ['belongs_to_user', auth()->id()],
            ['project_id', $id],
            ])->get();

        $user = Auth::user()->unreadNotifications()->where([
            ['data->project_belongs_to', auth()->id()],
            ['data->project_id', $id],
            ['notifiable_id', auth()->id()],
            ['read_at', NULL]
        ])
        ->update(['read_at' => now()]);    

        return view('apply.applications', compact('applyings', 'id'));

    }
    

   public function myapplyings(){

        $user = Auth::user()->unreadNotifications()->where([
            ['data->project_belongs_to', '!=', auth()->id()],
            ['notifiable_id', auth()->id()],
            ['read_at', NULL]
        ])
        ->update(['read_at' => now()]);    

        return view('apply.myapplyings');
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
    public function store(Project $project)
    {
        //dd($project->applies->belongs_to_user);

        $this->validate(request(), [
            'body' => 'required|min:2|max:5000',
        ]); 
    
        $project->apply(request('body'));

        $project->user->notify(new NewApplyNotification(Auth::user(), 
        $project->applies->belongs_to_user,
        $project->applies->project_id,   
        ));     

        return back();
    }
    

    public function reply(Apply $apply_id){

        $this->validate(request(), [
            'body' => 'required|min:2|max:5000',
        ]); 
        $apply_id->applybody(request('body'));


        //hier we check if auth user is the same to apply user. if it's true then 
        //we notify the user that create the project, else notify we notify the user who has applyied
        if(Auth::user() == $apply_id->user){
            $user = $apply_id->project->user;
        }else{
            $user = $apply_id->user;     
        }
       
        $user->notify(new NewApplyNotification(Auth::user(), 
        $apply_id->belongs_to_user, 
        $apply_id->project_id));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function show(Apply $apply)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function edit(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apply $apply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apply $apply)
    {
        //
    }
}
