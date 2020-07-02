<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_model extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['fullname', 'state', 'city', 'country', 'payment_type', 'user_id', 'pincode'];
}
