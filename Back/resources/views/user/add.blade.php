<h2>
    add user
</h2>
<form action="{{ route('admin.users.add') }}" method="POST">
    @csrf
    <input type="text" name="userName" placeholder="ueserName">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="pass">
    <input type="hidden" name="status" value="0">
    <input type="checkbox" name="status" value="1"> Active
    <button type="submit">Add</button>
</form>