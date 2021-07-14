<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Today extends Model
{
    //
    protected $fillable = ['title','completed','approved','taskId','code_id'];
    public function scopeIsTaskId($query,$id){
        return $query->where('taskId',$id);
    }
    public function code(){
        return $this->belongsTo(Code::class);
    }
}
