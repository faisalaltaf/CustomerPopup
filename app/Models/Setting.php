<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    
    use HasFactory;
     protected $fillable = [
        'file_path', 'top_heading','store_name' ,'list_item','email','button','head_background',
        'top_heading_color','top_heading_font','list_items_color','list_items_font','button_colors','tags_shop','weekday'
    ];
}
