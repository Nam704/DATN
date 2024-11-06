<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>Role name</th>
            <th>Permission name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rolePermissions as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->role->display_name }}</td>
            <td>{{ $item->permission->display_name }}</td>
            <td>
                <button>temp</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>