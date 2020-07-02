<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_model extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['pro_name', 'pro_code', 'pro_price', 'stock', 'image', 'pro_info', 'category_id', 'spl_price'];
}
