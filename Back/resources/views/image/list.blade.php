<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
<a href="{{ route('admin.images.getFormAdd') }}">Create</a>

    <table border="2">

        <thead>
            <tr>
                <th>ID</th>
                <th>product_id</th>
                <th>name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($image as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product->name}}</td>
                {{-- <td>{{$item->name}}</td> --}}

                <td><img src="{{ Storage::url($item->name) }}" width="50" alt=""></td>
                <td>temp</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
