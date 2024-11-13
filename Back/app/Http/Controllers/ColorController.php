<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function list(){

        $list = Color::paginate(5);
        return view('color.list',compact('list'));
    }

    public function getFormAdd(){
        return view('color.add');
    }

    public function add(ColorRequest $req){
        $data = [
            'name'=>$req->name
        ];
        Color::create($data);
        return redirect()->route('admin.colors.list');
    }
    public function editColor($id){
        $color = Color::find($id);
        return view('color.edit',compact('color'));
    }
    public function edit($id,ColorRequest $req){
        // dd('ok');
        $color = Color::find($id);
        $data = [
            'name'=>$req->name
        ];
        $color->update($data);
        return redirect()->route('admin.colors.list');
    }
    

    public function deleteColor($id){
        $delete = Color::find($id);
        $delete -> delete();
        return redirect()->route('admin.colors.list')->with(
            [
                'massage' => 'Successfully deleted'
            ]
        );
    }

}
