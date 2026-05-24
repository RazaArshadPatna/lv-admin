<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Static Dashboard</title>

    @include('control-panel/config.header')

</head>

<body>

    @include('control-panel/config.sidebar')

    @include('control-panel/config/head')

    <div class="content">
        <div class=" container mt-5">
            <div class="card shadow">

                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-2">
                            <h3>Admin</h3>
                            <a href="{{ route('pages.index') }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>


                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('pages.update', $static->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="heading" class="form-control"
                                    value="{{ old('heading', $static->heading) }}" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $static->title) }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Current Image</label><br>
                                @if($static->image)
                                <img src="{{ asset('storage/'.$static->image) }}" width="80">
                                @else
                                <span class="text-muted">No image</span>
                                @endif
                            </div>




                            <div class="mb-3">
                                 <label class="form-label">Details</label>
                                 <textarea name="details" id="details">{{ old('details', $static->details) }}</textarea>
                            </div>



                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Static Pages
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('control-panel/config/footer')

        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('details');
</script>


</body>

</html>