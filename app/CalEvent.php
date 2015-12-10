<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalEvent extends Model
{
    use SoftDeletes;
    protected $table = 'cal_events';
    protected $fillable = ['qualification','id_user_cal_events','id_event_cal_events'];
    protected $dates = ['deleted_at'];
}
