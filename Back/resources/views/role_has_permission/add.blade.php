<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<h3>Add</h3>
<table border="1">
    <thead>
        <tr>

            <th>Role Name</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>

    <tbody>
        <tr>
            <td>

                <select id="role-selected" style="width: 100%">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
                <p>List permission</p>
            </td>

        </tr>

        @foreach ($permissions as $permission)
        <tr>

            <td>
                <button>{{ $permission->display_name }} </button>
                <input type="hidden" value="{{ $permission->id }}">{{ $permission->id }}</input>
            </td>
            <td>
                <p class="status"> </p>
            </td>
            <td><button class="action">Add</button></td>
        </tr>
        @endforeach
        {{ $permissions->links() }}
    </tbody>
</table>
<a href="{{ route('dashboard') }}">back to dashboard</a>
<a href="{{ route('admin.rolePermissions.list') }}">Back to list</a>
<script src="{{ asset('js/RoleHasPermission-add.js') }}"></script>