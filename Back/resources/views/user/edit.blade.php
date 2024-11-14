<h2>
    edit user
</h2>
<form action="{{ route('admin.users.update',$user) }}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="name" placeholder="name" value="{{ old('name',$user->name) }}">
    <input type="text" name="email" placeholder="email" value="{{ old('email',$user->email) }}">
    <a href=""><button>reset password</button></a>
    <input type="hidden" name="status" value="1">
    <input type="checkbox" name="status" value="0" {{ !$user->status ? "checked" : "" }}> Active

    <button type="submit">edit</button>
</form>