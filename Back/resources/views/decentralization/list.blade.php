<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<a href="{{ route('admin.decentralization.getFormEdit') }}">Edit</a>
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
                <button type="button" name="lock-active" value="{{ $item->user->id }}"
                    class="btn btn-danger rounded-pill" href="{{-- route('admin.users.lock',$item->id) --}}">
                    @if ($item->user->status==0)
                    {{ 'Lock' }}
                    @else

                    {{ 'Active' }}
                    @endif
                </button>

            </td>

        </tr>
        @endforeach


    </tbody>
</table>
<a href="{{ route('dashboard') }}">back to dashboard</a>
<script src="{{ asset('js/decentralization.js') }}"></script>