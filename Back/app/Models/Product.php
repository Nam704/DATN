<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $dates = ["deleted_at"];
    protected $fillable = [
        "id", "product_code", "name", "price",
        "quantity", "description",
        "status"
    ];
    function brand()
    {
        return  $this->belongsToMany(Brand::class, "product_brands", "product_id", "brand_id");
    }
    function category()
    {
        return  $this->belongsToMany(Category::class, "product_categories", "product_id", "category_id");
    }
    function color()
    {
        return $this->belongsToMany(Color::class, "product_colors", "product_id", "color_id");
    }
    function image()
    {
        return $this->belongsToMany(Image::class, "product_images", "product_id", "image_id");
    }
    function ram()
    {
        return $this->belongsToMany(Ram::class, "product_rams", "product_id", "ram_id");
    }
    function rom()
    {
        return $this->belongsToMany(Rom::class, "product_images", "product_id", "rom_id");
    }
    function list()
    {
        return $this->query()->select(
            "id",
            "name",
            "product_code",
            "price",
            "quantity",
            "description",
            "status",

        )->get();
    }
}