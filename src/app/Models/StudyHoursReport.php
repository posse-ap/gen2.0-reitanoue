<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyHoursReport extends Model
{
    use HasFactory;
    protected $table = 'study_hours_reports';
    protected $fillable = ['user_id','study_hour','study_date','language_id','content_id'];
}
