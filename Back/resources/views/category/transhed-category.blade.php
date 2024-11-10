{{-- 

<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<a href="{{ route('admin.category.list') }}" >Out</a>

<table border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>name</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($showTrashedCategories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('admin.category.restore',$category->id) }}">Restore</a>
                
                
            </td>
           
        </tr>
            
        @endforeach

    </tbody>

</table>


</div> --}}
