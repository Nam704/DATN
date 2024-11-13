<div >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<a href="{{ route('admin.category.getFormAdd') }}" class="btn btn-success mb-3">Create</a>

<table border="1" class=" table ">
    <thead>
        <tr>
            <th>STT</th>
            <th>name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $key => $value)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value->name }}</td>
            
            <td>
                <a href="{{ route('admin.category.editCategory',$value->id) }}" class="btn btn-">Edit</a>
                
                
                <form action="{{ route('admin.category.delete',$value->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button onclick=" return confirm('Are you sure you want to delete this data')" class="btn btn-danger">delete</button>
                </form>
            </td>
           
        </tr>
            
        @endforeach

    </tbody>
   
   

</table>
{{ $list->links() }}

    <button id="story-Delete" >Story Delete</button>
<script src="{{ asset('js/category-lits-sofdelete.js') }}"></script>
<div class="show"></div>

</div>
