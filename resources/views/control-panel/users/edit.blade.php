<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

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
                            <a href="/admin/users" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
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
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <select name="role" class="form-select" required>
                                    <option value="">Select Role</option>

                                    <option value="admin" {{ old("role", $user->role) == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="editor" {{ old("role", $user->role) == 'editor' ? 'selected' : '' }}>
                                        Editor
                                    </option>

                                    <option value="user" {{ old("role", $user->role) == 'user' ? 'selected' : '' }}>
                                        User
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Current Image</label><br>
                                @if($user->image)
                                <img src="{{ asset('storage/'.$user->image) }}" width="80">
                                @else
                                <span class="text-muted">No image</span>
                                @endif
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update User
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