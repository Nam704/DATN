<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $product;
    protected $image;
    function __construct()
    {
        $this->product = new Product();
        $this->image = new Image();
    }
    function list(){
        $image = $this->image->with(['product'])->get();
        return view('image.list',compact('image'));
    }
    function getFormAdd(){
        $products = Product::all();
        return view('image.add',compact('products'));
    }
    public function add(ImageRequest $req)
{
    $path = ""; // Biến để lưu đường dẫn của ảnh

    // Kiểm tra xem yêu cầu có tệp ảnh không
    if($req->hasFile('name')) {
        $image = $req->file('name'); // Lấy tệp ảnh
        $newName = time() . '.' . $image->getClientOriginalExtension(); // Tạo tên mới cho ảnh
        $path = $image->storeAs('image', $newName, 'public'); // Lưu ảnh vào thư mục 'image' trong storage
    }

    // Gán giá trị cho dữ liệu cần lưu vào bảng images
    $data = [
        'name' => $path,  // Đường dẫn ảnh được lưu trữ
        'product_id' => $req->product_id,  // Gán product_id nếu cần
    ];
// dd($data);
    // Tạo bản ghi mới trong bảng images
    $this->image->create($data);

    // Chuyển hướng sau khi thêm thành công
    return redirect()->route('admin.images.list')->with('success', 'Image added successfully!');
}

}
