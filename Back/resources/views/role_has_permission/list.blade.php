<a href="{{ route('admin.rolePermissions.getFormAdd') }}">Add new permission to role</a>
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
                <a href="{{ route('admin.rolePermissions.getFormEdit',$item->role->id) }}"><button
                        class="btn-edit">Edit</button></a>

            </td>
        </tr>

        @endforeach
    </tbody>
</table>
<a href="{{ route('dashboard') }}">back to dashboard</a>