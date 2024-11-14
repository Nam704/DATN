<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<a href="{{ route('admin.permissions.getFormAdd') }}">Create</a>


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
                    <button>
                        <a href="{{ route('admin.permissions.editPermission', $item->id) }}">Edit</a>

                    </button>
                    <form action="{{ route('admin.permissions.delete', $item->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure you want to delete this data')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $permissions->links() }}
<a href="{{ route('dashboard') }}">back to dashboard</a>
<div>
    <button id="sof-delete">Story delete</button>
<script src="{{ asset('js/permission-list-sofdelete.js') }}"></script>
<div class="show"></div>
</div>

