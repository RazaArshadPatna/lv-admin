<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Static Pages</title>

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
                    <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="heading" class="form-control" value="{{ old('heading') }}"
                                    placeholder="Full Heading" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    placeholder="Title" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>


                            <div class="mb-3">
                                 <label class="form-label">Details</label>
                                 <textarea name="details" id="details"></textarea>
                            </div>


                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-success">
                                    Create User
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