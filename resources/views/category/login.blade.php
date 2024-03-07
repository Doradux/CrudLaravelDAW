<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">


            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Identify yourself</h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('categories/login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Identify</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
