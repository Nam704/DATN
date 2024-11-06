<a href="{{ route('admin.decentralization.getFormAdd') }}">add new user with role</a>
<table border="1">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Role Name</th>
            <th>Permissions</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($userRoles as $item)
        <tr>
            <td>
                <i class="ri-arrow-down-circle-line"></i>
                {{ $item->user->name }}
            </td>

            <td>{{ $item->role->display_name }}</td>
            <td>
                <div class="mb-3">

                    <select class="form-select" id="example-select">
                        @foreach ($item->RoleHasPermission($item->role_id) as $permision)
                        <option>{{ $permision->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>{{ $item->user->status==0?'active':'deactive' }}</td>
            <td>
                <a type="button" class="btn btn-danger rounded-pill"
                    href="{{-- route('admin.users.lock',$item->id) --}}">
                    @if ($item->user->status==0)
                    {{ 'Lock' }}
                    @else

                    {{ 'Active' }}
                    @endif
                </a>
                <a type="button" class="btn btn-warning rounded-pill"
                    href="{{-- route('admin.users.editUser',$item->id) --}}">Edit</a>
            </td>

        </tr>
        @endforeach


    </tbody>
</table>