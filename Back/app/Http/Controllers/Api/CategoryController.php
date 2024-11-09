<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showTrashedCategories(){
        $showTrashedCategories =Category::onlyTrashed()->get();
        return response()->json([
            'data' => $showTrashedCategories
        ]);
    }

    public function restore($id){
        $category = Category::withTrashed()->find($id);
        // if(!$category){
        //     return redirect()->route('admin.category.list')->with([
        //         'warning' => 'Không có dữ liệu của danh mục'
        //     ]);
        // }

        $category->restore();
        // return redirect()->route('admin.category.list')->with([
        //     'success' => 'Restore thành công'

        // ]);
        
   }
}
