<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Product_code</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Status</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Ram</th>
            <th>Rom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>\
            <td>{{ $item->product_code }}</td>

            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Description</td>
            <td>{{ $item->status==0?"active":"deactive" }}</td>
            <td>{{ $item->category->name}}</td>
            <td>{{ $item->brand->name }}</td>
            <td>
                <select name="" id="">
                    @foreach ($collection as $item)

                    @endforeach
                </select>
            </td>
            <td>{{ $item->ram->ram_size }}</td>
            <td>{{ $item->rom->rom_size }}</td>
            <td><button>temp</button></td>

        </tr>
        @endforeach
    </tbody>
</table>