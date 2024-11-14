<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <form action="{{ route('admin.permissions.add') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div>
            name:
            
            <input type="text" id="name" name="name" class="form-control" >
            
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            display_name:
            <input type="text" class="form-controll" id="display_name" name="display_name">
            @error('display_name')
                {{ $message }}
            @enderror
        </div>
        <button>Create</button>
    </form>
</div>
