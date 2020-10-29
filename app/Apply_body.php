<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Apply_body extends Model
{

    protected $guarded = [];

    public function apply(){
        
        return $this->belongsTo(Apply::class); 
    }

    public function user(){
        
        return $this->belongsTo(User::class); 
    }
    

}
