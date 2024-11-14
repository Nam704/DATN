<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Đảm bảo rằng trường 'product_id' đúng
    protected $fillable = [
        'product_id'
        ,'name'
    ];

    // Đặt tên bảng cho model (nếu bảng không phải là số nhiều của tên model)
    protected $table = 'images';

    // Mối quan hệ với bảng products (belongsTo)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Lấy tất cả các product_id từ bảng images
    public function listProductIds($product_id)
    {
        return $this->query()->where("product_id",$product_id)->get();
    }
    public function list()
    {
        return $this->query()->select('id','product_id','name')->get();
    }
}
