<?php

namespace  App;

use Illuminate\Database\Eloquent\Model;

class StudyHoursReport extends Model
{
    //
    protected $table = 'study_hours_reports';
    protected $fillable = ['study_hour'];
}
