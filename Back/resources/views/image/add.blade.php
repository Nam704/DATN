

<div>
    <a href="{{ route('admin.images.list') }}" class="btn btn-primary">Back</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.images.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Chọn sản phẩm:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Chọn sản phẩm</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div>
            image:
            <input type="file" name="name" class="form-controll" id="name">
         
        </div>
        <button>Submit</button>

    </form>
</div>
