<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th> name</th>
            <th>display_name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->display_name }}</td>
            <td>
                <button>temp</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{{ $permissions->links() }}