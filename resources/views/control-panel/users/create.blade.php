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
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Full Name" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Email Address" required>
                            </div>


                            <div class="col-lg-6 mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password" required>
                            </div>


                            <div class="col-lg-12 mb-3">
                                <select name="role" class="form-select" required>
                                    <option value="">Select Role</option>

                                    <option value="admin">
                                        Admin
                                    </option>

                                    <option value="editor">
                                        Editor
                                    </option>

                                    <option value="user">
                                        User
                                    </option>
                                </select>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
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

</body>

</html>