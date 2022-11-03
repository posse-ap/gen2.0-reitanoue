<?php

namespace  App;

use Illuminate\Database\Eloquent\Model;

class StudyHoursReport extends Model
{
    //
    protected $table = 'study_hours_reports';
    protected $fillable = ['user_id','study_hour','study_date','language_id','content_id'];
}
