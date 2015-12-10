<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgUser extends Model
{
    use SoftDeletes;
    protected $table = 'img_users';
    protected $fillable = ['dato','id_perfil'];
    protected $dates = ['deleted_at'];
}
