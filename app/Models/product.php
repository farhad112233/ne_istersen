<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';

   protected $guarded = [

   ];

    public function cat()
    {
        return $this->belongsTo(cat::class,'catId','id');
    }


}
