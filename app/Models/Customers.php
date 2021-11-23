<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
   protected $fillable = [
        'customer_id', 'email', 'accept_merketing','store_name',
    ];
}
