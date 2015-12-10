<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intereses extends Model
{
    use SoftDeletes;
    protected $table = 'intereses';
    protected $fillable = ['nombre', 'descripcion'];
    protected $dates = ['deleted_at'];
}
