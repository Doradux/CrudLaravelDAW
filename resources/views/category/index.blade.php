<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <p class="text-end">{{Session::get('user')}}</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories
                        <a href="{{ url('categories/logout') }}" class="btn btn-warning float-end">Log out</a>
                        <a href="{{ url('categories/create') }}" class="btn btn-prymary float-end">Add Category</a>
                    </h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Is Active</th>
                                <th>Last Edited</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->is_active)
                                    Active
                                    @else
                                    No Active
                                    @endif
                                </td>
                                <td>{{ $item->last_edited }}</td>
                                <td>
                                    <a href="{{ url('categories/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                    <a href="{{ url('categories/'.$item->id.'/delete') }}" class="btn btn-danger mx-2" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
