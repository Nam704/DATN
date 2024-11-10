<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

<form action="{{ route('admin.colors.edit',$color->id) }}" method="post" >
    @method('put')
    @csrf
    name:
    <input type="text" name="name" id="name" class="form-control" value="{{ $color->name }}">
    <button >Submit</button>
</form>

</div>