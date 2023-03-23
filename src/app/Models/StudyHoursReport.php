<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyHoursReport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'study_hours_reports';
    protected $fillable = ['user_id','study_hour','study_date','language_id','content_id'];
}
