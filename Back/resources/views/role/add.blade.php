<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

<div>
    <a href="{{ route('admin.roles.list') }}" class="btn btn-primary">Back</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.roles.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            name:
            <input type="text" name="name" id="name">
        </div>
        <div>
            display_name:
            <input type="text" name="display_name" class="form-controll" id="display_name">
            @error('display_name')
            {{ $message }}
                
            @enderror
        </div>
        <button>Submit</button>

    </form>
</div>
