<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<a href="{{ route('admin.colors.getFormAdd') }}">Create</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($list as $key=>$value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}</td>
            <td>
                <a href="{{ route('admin.colors.editColor',$value->id) }}">Edit</a>
                <a href="">Delete</a>
    
            </td>
        </tr>
            
        @endforeach
    </tbody>
   
</table>


</div>
