<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function showTrashedRam(){
        $showTrashedRam =Ram::onlyTrashed()->get();
        return response()->json([
            'data' => $showTrashedRam
        ]);
    }

    public function restore($id){
        $ram = Ram::withTrashed()->find($id);
    

        $ram->restore();
        
        
   }
}
