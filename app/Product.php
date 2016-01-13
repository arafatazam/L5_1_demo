<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','photo','model'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public static function generateUniqueImageName($length=40)
    {
        $name = strtolower(str_random($length)).'.jpg';
        if (static::wherePhoto($name)->exists()) {
            return static::generateUniqueImageName($length);
        }
        return $name;
    }
}
