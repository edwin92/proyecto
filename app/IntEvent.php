<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntEvent extends Model
{
    use SoftDeletes;
    protected $table = 'int_events';
    protected $fillable = ['id_interes_int_events', 'id_event_int_events'];
    protected $dates = ['deleted_at'];
}
