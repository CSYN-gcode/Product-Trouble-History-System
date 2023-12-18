<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSetup extends Model
{
    use HasFactory;

    protected $table = 'p4_machine_setups';

    public function first_in_charged()
    {
    	return $this->hasOne(User::class, 'id', 'first_in_charged');
    }

    public function second_in_charged()
    {
    	return $this->hasOne(User::class, 'id', 'second_in_charged');
    }

    public function third_in_charged()
    {
    	return $this->hasOne(User::class, 'id', 'third_in_charged');
    }
}
