<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    
    
    public function showTranshedColor(){
    $showTranshedColor = Color::onlyTrashed()->get();
    return response()->json([
        'data' => $showTranshedColor
    ]);
}
public function restore($id){
    $color = Color::withTrashed()->find($id);
    $color->restore();
    
}
}
