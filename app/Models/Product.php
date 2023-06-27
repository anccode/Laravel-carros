<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;
    protected $guarded=['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sale_details(){
        return $this->hasMany(SaleDetail::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    //Query scopes
    public function scopeCategory($query,$category_id){
        if($category_id){
            return $query->where('category_id',$category_id);
        }
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    //Los accesores y mutadores
    public function getPriceDiscountAttribute(){
        return number_format($this->price-(($this->discount/100)*$this->price),2);
    }

}
