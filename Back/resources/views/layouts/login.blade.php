<form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="text" name="password">
    <button type="submit">Login</button>
</form>