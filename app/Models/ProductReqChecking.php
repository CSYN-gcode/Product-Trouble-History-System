<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductReqCheckingDetails;

class ProductReqChecking extends Model
{
    use HasFactory;

    protected $table = 'p5_prod_req_checkings';

    public function prod_req_checking_details(){
        return $this->hasMany(ProductReqCheckingDetails::class, 'prod_req_checking_id','id');
    }
}
