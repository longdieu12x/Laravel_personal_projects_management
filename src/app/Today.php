<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Today extends Model
{
    //
    protected $fillable = ['title','completed','approved','taskId', 'waiting'];
}
