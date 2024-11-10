<?php

namespace App\Http\Controllers;

use App\Http\Requests\RamRequest;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function list(){
        $list = Ram::paginate(5);
        return view('./ram.list',compact('list'));
    }
    public function getFormAdd(){
        return view('ram.add');
    }
    public function add(RamRequest $req){
       
        $data = [
            'ram_size' => $req->ram_size
        ];
        Ram::create($data);
        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'new successful additions'
            ]
        );

    }
    public function editRam($id){
        $ram = Ram::find($id);
        return view('ram.edit',compact('ram'));
    }
    public function edit($id , Request $req){
        $ram = Ram::find($id);
        $data = [
            'ram_size' => $req->ram_size
        ];
        $ram->update($data);
        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );

    }
    public function delete($id){
        $delete = Ram::find($id);
        $delete->delete();
        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );
    }
    
    
}
