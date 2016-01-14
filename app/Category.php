<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','parent_id'];

    public function parent()
    {
        return $this->belongsTo('App\Category','parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category','parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function getFullCategoryList(array $ids){
        $completeList = [];
        foreach($ids as $id){
            $obj = $this->find($id);
            do{
                $completeList[] = $obj->id;
                $obj = $obj->parent;
            }while($obj);
        }
        return array_unique($completeList);
    }
}
