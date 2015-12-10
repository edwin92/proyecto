<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntUser extends Model
{
    use SoftDeletes;
    protected $table = 'int_users';
    protected $fillable = ['id_user', 'id_interes'];
    protected $dates = ['deleted_at'];
}
