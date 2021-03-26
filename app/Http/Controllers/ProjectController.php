<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use \App\Http\View\Composers\DropdownsComposer;

use App\Project;

use App\Comment;

use Carbon\Carbon;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth'); //if is not logged in canot create project
    }

     public function index()
    {     
        // projects only from auth user

        $projects = Project::latest();
        
        $projects = $projects->where('user_id', auth()->id())->get();
        
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $this->validate(request() ,[
            'project_name' => 'required|min:2|max:220',
            'started_at' => 'required',
            'branch' => 'required',
            'description' => 'required|min:2|max:15000',
            'progress' => 'required',
            'help' => 'required',
            'country' => 'required',
            'city' => 'required',
            'website' => 'url|nullable',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if(request()->hasFile('cover_image')){
            //Get filename with extention
            $filenameWithExt = request()->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extention = request()->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            //Upload Image
            $path = request()->file('cover_image')->storeAs('cover_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

   
      
        Project::create([
            'user_id' => auth()->id(), //the same as auth()->user()->id;
            'project_name' => request('project_name'),
            'started_at' => request('started_at'),
            'branch' => request('branch'),
            'description' => request('description'),
            'progress' => request('progress'),
            'help' => request('help'),
            'country' => request('country'),
            'city' => request('city'),
            'website' => request('website'),
            'cover_image' => $fileNameToStore
        ]);

        return redirect('/index/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         
        
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
         //check for correct user
         if(auth()->user()->id !== $project->user_id){
            return redirect('/')->with('error', 'Unauthorize Page');
        }

        return view('project.show' , compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //[ Rule::in(["Company","Start up","Investor","Person", " "]),
        $this->validate(request() ,[
            'project_name' => 'required|min:2|max:220',
            'branch' => 'required',
            'description' => 'required|min:2|max:10000',
            'progress' => 'required',
            'help' => 'required',
            'country' => 'required',
            'city' => 'required',
            'website' => 'url|nullable',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if(request()->hasFile('cover_image')){
            //Get filename with extention
            $filenameWithExt = request()->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extention = request()->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            //Upload Image
            $path = request()->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

   
        DB::table('projects')->where('id', $id)->update([
            'user_id' => auth()->id(), //the same as auth()->user()->id;
            'project_name' => request('project_name'),
            'branch' => request('branch'),
            'description' => request('description'),
            'progress' => request('progress'),
            'help' => request('help'),
            'country' => request('country'),
            'city' => request('city'),
            'website' => request('website'),
            'cover_image' => $img = request()->hasFile('cover_image') 
            ? $fileNameToStore : $img = Project::where('id', $id)->first()->cover_image,
        ]);

        return redirect('/index/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if(auth()->user()->id !== $project->user_id){
            return redirect('/')->with('error', 'Unauthorize Page');
        } 

        if($project->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$project->cover_image);
        }

        $project->delete();

        session()->flash('message', 'Data Deleted Successfully.');

        return back();
    }

    
}
