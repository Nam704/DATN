<a href="{{ route('admin.users.getFormAdd') }}">add new user</a>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>user name</th>
            <th>email </th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->status==0?"active":"lock" }}</td>

            <td>
                <form action="{{ route('admin.users.destroy',$item) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('admin.users.getFormUpdate',$item) }}">Edit</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
<a href="{{ route('dashboard') }}">back to dashboard</a>