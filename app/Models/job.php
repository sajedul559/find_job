<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    function category(){
    	return $this->belongsTo(Category::class);
    }
    function user(){
    	return $this->belongsTo(User::class);
    }
    public function applyJobs()
    {
        return $this->hasMany(Apply::class,'job_id','id');

    }

    public function next(){
        // get next user
        return Job::where('id', '>', $this->id)->first();
    
    }
    public  function previous(){
        // get previous  user
        return Job::where('id', '<', $this->id)->find();
    
    }
}
