<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Slider Dashboard</title>

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
                                <h3>Slider</h3>

                                <div>
                                    <a href="{{ route('slider.create') }}" class="btn btn-success">
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
                            <table class="table table-bordered yajra-datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Heading</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @include('control-panel/config/footer')

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> -->

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>

$(function () {

    $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,

        ajax: "{{ route('slider.index') }}",

        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },

            {
                data: 'image',
                name: 'image',
                orderable: false,
                searchable: false
            },

            {
                data: 'heading',
                name: 'heading'
            },

            {
                data: 'title',
                name: 'title'
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
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