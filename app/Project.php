<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Code;
class Project extends Model
{
    //
    protected $fillable = ['name'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function code(){
        return $this->hasOne(Code::class);
    }
}
