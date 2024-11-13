<div>
    <a href="{{ route('admin.brands.list') }}">Back Home</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.brands.edit',$brand->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            name:
            <input type="text" name="name" class="form-controll" id="name" value="{{ old('name',$brand->name) }}">
            @error('name')
            {{ $message }}
                
            @enderror
        </div>
        <button>Edit</button>

    </form>
</div>