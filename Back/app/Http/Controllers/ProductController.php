<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    function __construct()
    {
        $this->product = new Product();
    }
    function list()
    {
        $products = $this->product->list();
        // Thêm danh mục cho từng sản phẩm
        foreach ($products as $product) {
            $product->category = $product->category->first(); // Lấy danh mục đầu tiên
            $product->brand = $product->brand->first();
            $product->ram = $product->ram->first();
            $product->rom = $product->rom->first();
        }
        return view("product.list", compact("products"));
    }
}
