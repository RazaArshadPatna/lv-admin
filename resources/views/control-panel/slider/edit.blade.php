<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Slider Dashboard</title>

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
                            <a href="{{ route('slider.index') }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
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
                    <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="heading" class="form-control"
                                    value="{{ old('heading', $slider->heading) }}" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $slider->title) }}" required>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <select name="status" class="form-select" required>
                                    <option value="">Select Status</option>

                                    <option value="active" {{ old("status", $slider->status) == 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="inactive" {{ old("status", $slider->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Current Image</label><br>
                                @if($slider->image)
                                <img src="{{ asset('storage/'.$slider->image) }}" width="80">
                                @else
                                <span class="text-muted">No image</span>
                                @endif
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update slider
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('control-panel/config/footer')

</body>

</html>