<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){

        $list = Brand::paginate(5);
        return view('brand.list',compact('list'));
    }

    public function getFormAdd(){
        return view('brand.add');
    }

    public function add(BrandRequest $req){
        $data = [
            'name'=>$req->name
        ];
        Brand::create($data);
        return redirect()->route('admin.brands.list');
    }
    public function editBrand($id){
        $brand = Brand::find($id);
        return view('brand.edit',compact('brand'));
    }
    public function edit($id,BrandRequest $req){
        // dd('ok');
        $brand = Brand::find($id);
        $data = [
            'name'=>$req->name
        ];
        $brand->update($data);
        return redirect()->route('admin.brands.list');
    }
    

    public function deleteBrand($id){
        $delete = Brand::find($id);
        $delete -> delete();
        return redirect()->route('admin.brands.list')->with(
            [
                'massage' => 'Successfully deleted'
            ]
        );
    }
}
