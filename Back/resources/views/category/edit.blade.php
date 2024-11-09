<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <form action="{{ route('admin.category.edit',$editCategory->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            name:
            <input type="text" name="name" class="form-controll" id="name" value="{{ old('name',$editCategory->name) }}">
        </div>
        <button>Edit</button>

    </form>
</div>