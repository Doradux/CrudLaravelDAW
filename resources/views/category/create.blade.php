<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <p class="text-end">{{Session::get('user')}}</p>
    <div class="row">
        <div class="col-md-12">


            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Add Categories
                        <a href="{{ url('categories') }}" class="btn- btn-prymary float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('categories/create') }}" method="POST">
                        @csrf

                        <input type="hidden" name="last_edited" value="{{ Session::get('user') }}">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Is Active</label>
                            <input type="checkbox" name="is_active"  {{ old('name') == true ? checked:'' }}>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
