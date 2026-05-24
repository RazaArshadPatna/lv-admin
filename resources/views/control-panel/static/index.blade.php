<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Static Dashboard</title>

    @include('control-panel/config.header')


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>
    .table-dark {
        --bs-table-bg: #0f5959;
    }
    </style>

</head>

<body>

    @include('control-panel/config.sidebar')

    @include('control-panel/config/head')

    <div class="content">
        <div class=" container mt-5">
            <div class="card shadow">

                <div class="card-body">


                    <form id="bulkDeleteForm" action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="d-flex justify-content-between mb-2">
                                <h3>Static Pages</h3>

                                <div>
                                    <a href="{{ route('pages.create') }}" class="btn btn-success">
                                        <i class="fa-solid fa-square-plus"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger" id="deleteSelected">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </div>

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


                        <!-- User Table -->
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="60">
                                            <input type="checkbox" id="checkAll"> All
                                        </th>

                                        <th>Image</th>
                                        <th>Heading</th>
                                        <th>Title</th>
                                        <th width="120">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($static as $static)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $static->id }}"
                                                class="rowCheckbox">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            @if($static->image)
                                            <img src="{{ asset('storage/'.$static->image) }}" width="50" height="50"
                                                class="rounded-circle object-fit-cover">
                                            @else
                                            <img src="{{ asset('assets/img/default-user.png') }}" width="50" height="50"
                                                class="rounded-circle">
                                            @endif
                                        </td>

                                        <td>{{ $static->heading }}</td>
                                        <td>{{ $static->title }}</td>

                                        <td>

                                            <a href="{{ route('pages.edit', $static->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No Pages found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('control-panel/config/footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
            ordering: true,
            searching: true,
            responsive: true,
            columnDefs: [{
                    orderable: false,
                    targets: [1, 4]
                } // Disable sorting for Image & Action
            ]
        });
    });
    </script>


<script>
$(document).ready(function() {

    // Select / Deselect all
    $('#checkAll').on('click', function () {
        $('.rowCheckbox').prop('checked', this.checked);
    });

    // Update "All" checkbox when single checkbox changes
    $(document).on('change', '.rowCheckbox', function () {
        $('#checkAll').prop(
            'checked',
            $('.rowCheckbox:checked').length === $('.rowCheckbox').length
        );
    });

    // Confirm before delete
    $('#bulkDeleteForm').on('submit', function (e) {
        if ($('.rowCheckbox:checked').length === 0) {
            e.preventDefault();
            alert('Please select at least one user to delete.');
            return;
        }

        if (!confirm('Are you sure you want to delete selected users?')) {
            e.preventDefault();
        }
    });

});
</script>
</body>
</html>