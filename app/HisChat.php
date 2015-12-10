<?php

namespace SocialNet;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HisChat extends Model
{
    use SoftDeletes;
    protected $table = 'his_chats';
    protected $fillable = ['message','date','id_chat_his'];
    protected $dates = ['deleted_at'];
}
