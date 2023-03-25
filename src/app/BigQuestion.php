<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class BigQuestion extends Model
{
    protected $fillable = [
        'name'
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
