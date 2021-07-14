<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Code;
class Upcoming extends Model
{
    //
    protected $fillable = ['title','completed','approved','taskId','waiting','code_id'];
    public function scopeIsTaskId($query,$id){
        return $query->where('taskId',$id);
    }
    public function code(){
        return $this->belongsTo(Code::class);
    }
}
