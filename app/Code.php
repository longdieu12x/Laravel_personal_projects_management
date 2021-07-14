<?php

namespace App;
use App\Today;
use App\Upcoming;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    //
    protected $fillable = ['qr_code'];
    public function todays(){
        return $this->hasMany(Today::class);
    }
    public function upcomings(){
        return $this->hasMany(Upcoming::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
