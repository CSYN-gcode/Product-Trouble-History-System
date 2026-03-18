<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PartTroubleHistory;
use App\Models\User;

class PthsImprovements extends Model
{
    use HasFactory;

    protected $table = 'pths_improvements';
    protected $primaryKey = 'id';

    // public function user_info()
    // {
    //     return $this->hasMany(User::class, 'pic', 'id');
    // }

    public function parts_trouble_history()
    {
        return $this->belongsTo(PartTroubleHistory::class, 'history_id', 'id');
    }

    public function getPicUsersAttribute()
    {
        $ids = explode(',', $this->pic);
        return User::whereIn('id', $ids)
                    ->pluck('name')       // get only names
                    ->implode(', ');      // convert to string
    }
}
