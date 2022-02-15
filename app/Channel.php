<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //

    public function messages()
    {
        return $this->hasMany('App\Message', 'channel_id', 'id');
    }
}
