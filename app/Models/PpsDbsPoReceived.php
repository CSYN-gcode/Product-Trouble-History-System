<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PpsDbsDieset;

class PpsDbsPoReceived extends Model
{
    use HasFactory;

    protected $table = 'tbl_POReceived';
    protected $connection = 'mysql_rapid';

    public function pps_dieset()
    {
        return $this->hasOne(PpsDbsdieset::class, 'R3Code','ItemCode');
    }
}
