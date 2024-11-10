<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $list = Category::paginate(5);
        return view('./category/list')->with([
            'list' => $list
        ]);
    }

    public function getFormAdd(){
        return view('./category.add');
    }
    public function add(Request $req){
        $req->validate([
            'name' => 'required|string|max:255'
        ]);
        $data = [
            'name' => $req->name
        ];
        Category::Create($data);
        return redirect()->route('admin.category.list')->with([
            'success' => 'new successful additions'

        ]);
    }
    public function editCategory($id){
        $editCategory = Category::find($id);
        // dd($editCategory);

        return view('./category.edit')->with([
            'editCategory' => $editCategory
        ]);
    }
    public function edit($id ,Request $req){
        $editCategory = Category::find($id);
        
        
        $data = [
            'name' => $req->name
        ];
        $editCategory-> update($data);
        return redirect()->route('admin.category.list')->with([
            'success' => 'Successfully repaired'

        ]);
    }

    public function delete($id){
        $category = Category::find($id);
        
        $category ->delete();

        return redirect()->route('admin.category.list')->with([
            'delete' => 'Successfully deleted'

        ]);
    }

   

}
