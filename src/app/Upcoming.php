<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upcoming extends Model
{
    //
    protected $fillable = ['title','completed','approved','taskId'];
}
