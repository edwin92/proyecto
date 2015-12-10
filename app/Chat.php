<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;
    protected $table = 'chats';
    protected $fillable = ['id_char_org','id_chat_des'];
    protected $dates = ['deleted_at'];
}
