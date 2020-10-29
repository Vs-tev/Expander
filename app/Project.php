<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

use App\Comment;

use App\Apply_body;

use Illuminate\Support\Facades\DB;

class Project extends Model
{

    protected $dates = [
        'started_at',
    ];

    /*
   protected $fillable = [
       'project_name',
       'user_id',
       'started_at',
       'description',
       'progress',
       'help',
       'country',
       'city',
       'cover_image'];
*/
protected $guarded = [];

    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function comments(){
        
        return $this->hasMany(Comment::class);
    }

    public function applies(){
        
        return $this->hasOne(Apply::class);  //ursprunglich has one
    }


    public function addComment($body){
        
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id(),
            'project_id' => $this->id,
            ]);
    }


    //insert data into 'apply_body' and 'applies'
    public function apply($body){

      $newApply = $this->applies()->create([
            'body' => $body,
            'user_id' => auth()->id(),
            'project_id' => $this->id,
            'belongs_to_user' => $this->user->id,
            ]);


        $apply = new Apply_body;
        Apply_body::create([
            'apply_id' => $newApply->id,
            'user_id' => auth()->id(),
            'body' => $body
        ]); 
    }
    

    //chaeck if user has applyied for project (used id project_deteils.blade)
    public function hasApplied(){
        
        return $this->applies()->where([
            ['project_id', $this->id],
            ['user_id', auth()->id()]
            ])
        ->count() > 0;
    }

    //count all recived applyings (used in 'sidebar.blade')
    public function recivedAppyings(){
        return $this->applies()
        ->where('user_id', '!=', auth()->id())
        ->count();
    }

}

