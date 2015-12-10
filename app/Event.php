<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $table = 'events';
    protected $fillable = ['name','description','date','location','id_user_event', 'id_interes_event'];
    protected $dates = ['deleted_at'];
}
