<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalUser extends Model
{
    use SoftDeletes;
    protected $table = 'cal_users';
    protected $fillable = ['qualification','id_cal_org','id_cal_des'];
    protected $dates = ['deleted_at'];
}
