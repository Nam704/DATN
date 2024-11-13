<div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                <form action="{{ route('admin.colors.deleteColor',$value->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure you want to delete this data')">Delete</button>
                </form>
    
            </td>
        </tr>
            
        @endforeach
    </tbody>
   
</table>
{{ $list->links() }}

<button id="delete">Story Delete</button>
<script src="{{ asset('js/color-list-sofdelete.js') }}"></script>
<div class="show">
    
</div>

</div>
