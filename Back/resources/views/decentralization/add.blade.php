<!-- Thêm jQuery vào đầu hoặc cuối trang -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<a href="{{ route('admin.decentralization.list') }}">back to list</a>
<table border="1">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Role Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><input type="text" placeholder="userName..."></td>
            <td><input type="text" placeholder="roleName..."></td>

        </tr>
        <tr>
            <td>
                <select id="user-select">
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select id="role-select">
                    @foreach ($roles as $item)
                    <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                    @endforeach
                </select>
            </td>
            <td><button>Save</button></td>
        </tr>


    </tbody>
</table>
<script src="{{ asset('js/decentralization-add.js') }}"></script>