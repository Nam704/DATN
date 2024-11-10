<?php

namespace App\Http\Controllers;

use App\Http\Requests\RomRequest;
use App\Models\Rom;
use Illuminate\Http\Request;

class RomController extends Controller
{
    public function list(){
        $list = Rom::paginate(5);
        return view('./rom.list',compact('list'));
    }
    public function getFormAdd(){
        return view('rom.add');
    }
    public function add(RomRequest $req){
       
        $data = [
            'rom_size' => $req->rom_size
        ];
        Rom::create($data);
        return redirect()->route('admin.roms.list')->with(
            [
                'success' => 'new successful additions'
            ]
        );

    }
    public function editRom($id){
        $rom = Rom::find($id);
        return view('rom.edit',compact('rom'));
    }
    public function edit($id , Request $req){
        $rom = Rom::find($id);
        $data = [
            'rom_size' => $req->rom_size
        ];
        $rom->update($data);
        return redirect()->route('admin.roms.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );

    }
    public function delete($id){
        $delete = Rom::find($id);
        $delete->delete();
        return redirect()->route('admin.roms.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );
    }
    
    
}
