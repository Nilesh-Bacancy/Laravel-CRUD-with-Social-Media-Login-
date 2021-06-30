<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class product extends Model
{
    use HasFactory;
    function category()
    {
        return $this->belongsTo(category::class);
    }
  
}
