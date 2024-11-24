<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json([$this->product->list()], 200);
    }
}
