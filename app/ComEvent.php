<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComEvent extends Model
{
    use SoftDeletes;
    protected $table = 'com_events';
    protected $fillable = ['comment','date','id_user_com_events','id_event_com_events'];
    protected $dates = ['deleted_at'];
}
