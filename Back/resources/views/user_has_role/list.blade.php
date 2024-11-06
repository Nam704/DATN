<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>role name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userRoles as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->role->display_name }}</td>
            <td>
                <button>temp</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>