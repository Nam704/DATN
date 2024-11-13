<div>
    <a href="{{ route('admin.category.list') }}">Back Home</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.category.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            name:
            <input type="text" name="name" class="form-controll" id="name">
            @error('name')
            {{ $message }}
                
            @enderror
        </div>
        <button>Submit</button>

    </form>
</div>
