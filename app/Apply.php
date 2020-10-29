<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Apply extends Model
{
    protected $guarded = [];

    public function apply_body(){
        return $this->hasMany(Apply_body::class);
    }


    public function project(){

        return $this->belongsTo(Project::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function applybody($body){

        $this->apply_body()->create([
            'body' => $body,
            'apply_id' => $this->id,
            'user_id' => auth()->id(),
        ]); 
    }


    //this function is used in ApplyServiceProvider
    //
    public static function all_recievedApply(){

        return static::where('belongs_to_user', auth()->id())
        ->Limit(7)
        ->get()
        ->sortByDesc(function($query){
            return $query->apply_body->last()->created_at;
         });
    }

    
    //this function is used in ApplyServiceProvider
    public static function my_apply(){

        return static::where([
            ['user_id', auth()->id()],
            ['belongs_to_user', '!=', auth()->id()]
            ])
            ->Limit(7)
            ->get()
            ->sortByDesc(function($query){
                return $query->apply_body->last()->created_at;
             });
    }

}
