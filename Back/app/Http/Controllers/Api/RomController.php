<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rom;
use Illuminate\Http\Request;

class RomController extends Controller
{
    public function showTrashedRom(){
        $showTrashedRom =Rom::onlyTrashed()->get();
        return response()->json([
            'data' => $showTrashedRom
        ]);
    }

    public function restore($id){
        $rom = Rom::withTrashed()->find($id);
    

        $rom->restore();
        
        
   }
}
