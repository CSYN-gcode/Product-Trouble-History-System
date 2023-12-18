<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiesetConditionChecking extends Model
{
    use HasFactory;

    protected $table = 'p3_dieset_condition_checkings';

    public function checked_by()
    {
    	return $this->hasOne(User::class, 'id', 'checked_by');
    }
}
