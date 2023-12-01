<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use App\Model\AutoMailer;

class RapidXUserAccess extends Model
{
    protected $table = 'user_accesses';
    protected $connection = 'rapidx';

    public function email_recipient(){
        return $this->hasOne(AutoMailer::class, 'id', 'user_id');
    }
}
