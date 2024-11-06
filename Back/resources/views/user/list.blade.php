<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>email </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <button>temp</button>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>