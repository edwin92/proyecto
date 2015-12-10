<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgEvent extends Model
{
    use SoftDeletes;
    protected $table = 'img_events';
    protected $fillable = ['dato','id_img_events'];
    protected $dates = ['deleted_at'];
}
