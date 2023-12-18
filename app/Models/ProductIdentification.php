<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIdentification extends Model
{
    use HasFactory;

    protected $table = 'p1_product_identifications';

    public function users(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function created_by()
    {
    	return $this->hasOne(User::class, 'id', 'created_by');
    }
}
