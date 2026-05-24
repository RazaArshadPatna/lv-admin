@include('config.header')

@include('config.sidebar')

@include('config/head')
<div class="content">
    <div class=" container mt-5">
        <div class="card shadow">
            <div class="card-header fw-bold">
                Create Section
            </div>

            <div class="card-body">

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

                <form method="POST" action="/slider/store" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Heading</label>
                        <input type="text" name="heading" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subheading</label>
                        <input type="text" name="subheading" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </form>

            </div>
        </div>
    </div>

    @include('config/footer')