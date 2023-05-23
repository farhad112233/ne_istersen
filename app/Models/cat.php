<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'sort'
    ];


    public function product()
    {
        return $this->hasMany(product::class,'catId','id');
    }




/*
        protected $hidden = [

      ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
*/

}
