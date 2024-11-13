<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showTranshedBrand(){
        $showTranshedBrand =Brand::onlyTrashed()->get();
        return response()->json([
            'data' => $showTranshedBrand
        ]);
    }

    public function restore($id){
        $brand = Brand::withTrashed()->find($id);
       

        $brand->restore();
        
}
}
