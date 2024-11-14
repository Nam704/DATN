

<div>
    <a href="{{ route('admin.permissions.list') }}" >Back</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.permissions.edit', $editPermission->id) }}" method="POST" >
        @method('put')
        @csrf
        <div>
            name:
            
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $editPermission->name) }}">
            
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            display_name:
            <input type="text" class="form-controll" id="display_name" name="display_name"
            value="{{ old('display_name', $editPermission->display_name) }}">>
            @error('display_name')
                {{ $message }}
            @enderror
        </div>
        <button>Submit</button>

    </form>
    
</div>
