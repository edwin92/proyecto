<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parceros extends Model
{
    use SoftDeletes;
    protected $table = 'parceros';
    protected $fillable = ['date','id_parcero_org','id_parcero_des'];
    protected $dates = ['deleted_at'];
}
