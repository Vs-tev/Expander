<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\Notifications;
use App\Notifications\NewApplyNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profileExtention(){
        
        return $this->hasOne(ProfileExtention::class);
    }
    

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function comments(){
        
        return $this->hasMany(Comment::class);
    }

    public function apply_body(){
        
        return $this->hasMany(Apply_body::class);
    }

    public function applyings(){
        
        return $this->hasMany(Apply::class);
    }

    public function recivedApplications(){
        
      return DB::table('applies')->where('belongs_to_user', auth()->id())->count();
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function myApplyNotification(){

         return DB::table('notifications')
         ->select('data->project_id as project')
         ->where([
            ['data->project_belongs_to', '!=', auth()->id()], 
            ['notifiable_id', auth()->id()],
            ['read_at', NULL]
        ])
        ->get()
        ->groupBy('project');
    }

    public function recievedApplyNotification(){

        return DB::table('notifications')
        ->select('data->project_id as project')
        ->where([
           ['data->project_belongs_to', auth()->id()], 
           ['notifiable_id', auth()->id()],
           ['read_at', NULL]
       ])
       ->get()
       ->groupBy('project');
   }
    
   //check if apply is unread
   public function markAsUnread($applying_id){
        foreach($this->unreadNotifications as $notification){
            if($notification->data['project_id'] == $applying_id){
                
                return true;

            }  
        } 
    }
   


}
