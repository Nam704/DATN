<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div>
    <a href="{{ route('admin.roles.getFormAdd') }}">Create</a>


    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>display_name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->display_name }}</td>
                <td>
                    <button>
                        <a href="{{ route('admin.roles.editRole',$item->id) }}">Edit</a>

                    </button>
                    <form action="{{ route('admin.roles.delete',$item->id) }}" method="POST" >
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure you want to delete this data')">Delete</button>
                    </form>
                </td>
            </tr>
    
            @endforeach
        </tbody>
    </table>

    <button id="sof-delete">Story delete</button>
    <script src="{{ asset('js/role-list-sofdelete.js') }}"></script>
    <div class="show"></div>
</div>

