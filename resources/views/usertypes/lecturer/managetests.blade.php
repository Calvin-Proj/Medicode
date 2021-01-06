@extends('layouts.app')

@section('content')
<div class="container bg-white rounded-sm">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div>
                        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline">
                            Create Test
                        </button>
                        <!-- modal div -->

                        <!-- Create Test Model -->
                        <div class="absolute hidden top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" >
                            <div>
                                <div>
                                    <!-- Model Header -->
                                    <div>
                                        <div>
                                            <img>
                                        </div>
                                        <div>
                                            <button type="button">
                                            <svg class="w-5 h-5 text-white bg-secondary rounded-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.3 4.3a1 1 0 011.4 0L10 8.58l4.3-4.3a1 1 0 111.4 1.42L11.42 10l4.3 4.3a1 1 0 01-1.42 1.4L10 11.42l-4.3 4.3a1 1 0 01-1.4-1.42L8.58 10l-4.3-4.3a1 1 0 010-1.4z" clip-rule="evenodd"/></svg>
                                            </button>
                                        </div>
                                        <div class="flex justify-center text-xl text-white">
                                            <h4 class="">Fill In Details</h4>
                                        </div>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                            <strong>Success!</strong>Test was added successfully.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group flex justify-start p-2 text-white">
                                            <label for="test_date">Test Date:</label>
                                            <span class="w-14"></span>
                                            <input type="date" class="text-primary" name="test_date" id="test_date">
                                        </div>
                                        <div class="form-group flex justify-start p-2 text-white">
                                            <label for="test_time">Test Time:</label>
                                            <span class="w-8"></span>
                                            <span class="w-8"></span>
                                            <input type="time" class="text-primary" name="test_time" id="test_time">
                                        </div>
                                            <div class="form-group flex justify-start p-2 text-white">
                                            <label for="test_type">Test Type:</label>
                                            <span class="w-16"></span>
                                            Sick:
                                            <span class="w-2"></span>
                                            <input type="radio" value="0" class="form-control h-4 w-4" name="test_type" id="test_type">
                                            <span class="w-2"></span>
                                            Normal:
                                            <span class="w-2"></span>
                                            <input type="radio" value="1" class="form-control h-4 w-4" name="test_type" id="test_type">
                                        </div>
                                        <div class="form-group flex justify-start p-2 text-white">
                                            <label for="test_desc">Test Description: </label>
                                            <span class="w-4"></span>
                                            <textarea class="form-control w-60 text-gray-600 resize-y" name="test_desc" id="test_desc">
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer flex flex-wrap justify-end p-4">
                                        <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1" id="SubmitCreateTestForm">Create</button>
                                        <span class="w-2"></span>
                                        <button type="button" class="bg-primary rounded-lg text-white p-1">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Test Date</th>
                            <th>Test Type</th>
                            <th>Test Description</th>
                            <th>Test Time</th>
                            <th class="text-center px-20">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- keeps modal close -->



<!-- Edit Test Modal -->
<div class="modal hidden" id="EditTestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Test Edit</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Test was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditTestForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Test Modal -->
<div class="modal hidden" id="DeleteTestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Test Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4>Are you sure want to delete this Test?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="SubmitDeleteTestForm">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 5,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route('get-tests') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'test_date', name: 'test_date'},
                {data: 'test_type', name: 'test_type'},
                {data: 'test_desc', name: 'test_desc'},
                {data: 'test_time', name: 'test_time'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

        // Create test Ajax request.
        $('#SubmitCreateTestForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('tests.store') }}",
                method: 'post',
                data: {
                    test_date: $('#test_date').val(),
                    test_type: $('#test_type').val(),
                    test_desc: $('#test_desc').val(),
                    test_time: $('#test_time').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        setTimeout(function(){
                            $('.alert-success').hide();
                            $('#CreateTestModal').modal('hide');
                        }, 200);
                    }
                }
            });
        });

        // Get single test in EditModel
        $('.modelClose').on('click', function(){
            $('#EditTestModal').hide();
        });
        var id;
        $('body').on('click', '#getEditTestData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "tests/"+id+"/edit",
                method: 'GET',
                success: function(result) {
                    console.log(result);
                    $('#EditTestModalBody').html(result.html);
                    $('#EditTestModal').show();
                }
            });
        });

        // Update test Ajax request.
        $('#SubmitEditTestForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "tests/"+id,
                method: 'PUT',
                data:{
                    test_date: $('#test_date').val(),
                    test_type: $('#test_type').val(),
                    test_desc: $('#test_desc').val(),
                    test_time: $('#test_time').val(),
                    },
                success: function(result) {
                    if(result.errors)
                    {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else
                    {   $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        setTimeout(function()
                        {
                        $('.alert-success').hide();
                        $('#EditTestModal').hide();
                        }, 200);
                    }
                }
            });
        });

        // Delete test Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteTestForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                url: "tests/"+id,
                method: 'DELETE',
                success: function(result)
                {
                    setTimeout(function()
                    {
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteTestModal').hide();
                    }, 200);
                }
            });
        });
    });
</script>
@endsection
