<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function parent()
    {
        return $this->belongsTo(Category::class,'Category_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class,'Category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'Category_id');
    }

    public function property_group()
    {
        return $this->belongsToMany(propertyGroups::class);
    }

    public function hasPropertyGroup(propertyGroups $propertyGroups)
    {
        return $this->property_group()->where('property_groups_id',$propertyGroups->id)->exists();
    }

    public function getAllSubProducts()
    {
        $child_id=$this->child()->pluck('id');
        return Product::query()->whereIn('category_id',$child_id)
            ->orWhere('category_id',$this->id)
            ->get();
    }
}
