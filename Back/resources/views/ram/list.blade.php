<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <a href="{{ route('admin.rams.getFormAdd') }}" class="btn btn-success">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Size</th>
                <th>unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->unit }}</td>
                <td>
                    <form action="{{ route('admin.rams.delete',$item->id) }}" method="post">

                        @method('delete')
                        @csrf
                        <button onclick="return confirm('Are you sure you want to delete this data')"
                            class="btn btn-danger">Delete</button>

                    </form>

                    <a href="{{ route('admin.rams.editRam',$item->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {{ $list->links() }}

    <button id="sofdelete">Story delete</button>
    <script src="{{ asset('js/ram-list-sofdelete.js') }}"></script>
    <div class="show"></div>
</div>