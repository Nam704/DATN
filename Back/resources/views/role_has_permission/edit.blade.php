<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<h3>Edit</h3>
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
                <input id="role_id" type="hidden" value="{{ $role->id }}">
                <p>{{ $role->display_name }}</p>
                <p>List permission</p>
            </td>

        </tr>

        @foreach ($listIdPermissions as $id)
        <tr>

            <td>
                <button>{{ $permission->getDisplayName($id)->display_name }} </button>

            </td>
            <td>
                <p class="status"> </p>
            </td>
            <td>
                <button class="action-delete" value="{{ $id }}">Delete</button>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<script src="{{ asset('js/RoleHasPermission-edit.js') }}"></script>

<a href="{{ route('dashboard') }}">back to dashboard</a>
<a href="{{ route('admin.rolePermissions.list') }}">Back to list</a>