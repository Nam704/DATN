<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

<div>
    <a href="{{ route('admin.roms.list') }}" class="btn btn-primary">Back</a>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.roms.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            rom_site:
            <input type="number" name="rom_size" class="form-controll" id="rom_size">
            @error('rom_size')
            {{ $message }}
                
            @enderror
        </div>
        <button>Submit</button>

    </form>
</div>
