<?php

namespace App\Models;

use App\Http\Requests\AddDiscountRequest;
use App\Http\Requests\ProductPictureRequest;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function likes()
    {
        $this->belongsToMany(User::class,'like')->withTimestamps();
    }


    public function comments()
    {
        return $this->hasMany(comments::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function addpicture(ProductPictureRequest $request)
    {
        $path=$request->file('image')->storeAs('public/products/pictures',
            $request->file('image')->getClientOriginalName());

        $this->pictures()->create([
            'path'=>$path,
            'mime'=>$request->file('image')->getClientMimeType()
        ]);
    }

    public function deletepicture(Picture $picture)
    {
        Storage::delete($picture->path);
        $picture->delete();
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function addDiscount(AddDiscountRequest $request)
    {
        if(!$this->discount()->exists()){
            $this->discount()->create([
                'value' => $request->get('value')
            ]);
        }
        else{
            $this->discount()->update([
                'value'=>$request->get('value')
            ]);
        }
    }

    public function properties()
    {
        return $this->belongsToMany(properties::class)->withPivot('value')->withTimestamps();
    }

    public function deleteDiscount()
    {
        $this->discount()->delete();
    }

    public function getCostWithDiscountAttribute()
    {
       if($this->discount()->exists()){
           return $this->cost - $this->cost * $this->discount->value /100;
       }
       else{
           return $this->cost ;
       }
    }
}

