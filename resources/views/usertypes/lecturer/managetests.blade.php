@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline font-semibold hover:bg-highlight hover:text-black focus:bg-highlight focus:text-black" id="show_create" name="show_create">
                            Create Test
                        </button>
                        <!-- modal div -->
                        <!-- Create Test Model -->
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
<div id="CreateTestModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <div>
                <!-- Model Header -->
                <div class="modal-header">
                    <div class="flex flex-wrap justify-center">
                        <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
                    </div>
                    <div class="flex justify-center text-xl text-white">
                        <h4 class="">Fill In Details</h4>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
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
                        <span class="w-7"></span>
                        <span class="w-7"></span>
                        <input type="time" class="text-primary" name="test_time" id="test_time">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_type">Test Type:</label>
                        <span class="w-16"></span>
                        <select name="test_type" id="test_type" class="text-gray-600 w-32">
                            <option value="Standard Test">Standard Test</option>
                            <option value="Sick Test">Sick Test</option>
                        </select>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_desc">Test Description: </label>
                        <span class="w-3"></span>
                        <textarea class="form-control w-60 text-gray-600" name="test_desc" id="test_desc">
                        </textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer flex flex-wrap justify-end p-4">
                    <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black" id="SubmitCreateTestForm">Create</button>
                    <span class="w-2"></span>
                    <button type="button" class="bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black" id="hide_create" name="hide_create">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Test Modal -->
<div id="EditTestModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <!-- Modal Header -->
            <div class="flex flex-wrap justify-center">
                <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
            </div>
            <div class="modal-header flex justify-center text-xl text-white p-2">
                <h4 class="modal-title">Edit Test Details</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Test was edited successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditTestModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer relative flex flex-wrap justify-end p-4">
                <button type="button" class="btn btn-success text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1" id="SubmitEditTestForm">Update</button>
                <div class="w-2"></div>
                <button type="button" class="btn btn-danger modelClose text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Test Modal -->
<div style="display:none" id="DeleteTestModal">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto mx-2 text-left bg-secondary rounded-lg shadow-xl md:max-w-xl md:p-1 lg:p-2 md:mx-0 text-white border-primary border-2">
            <!-- Modal Header -->
            <div class="modal-header flex justify-center text-xl">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->

            <div class="modal-body p-2">
                <h4>Are you sure want to delete this test?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer p-2 modal-footer flex flex-wrap justify-center">
                <button type="button" class="btn btn-danger bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black" id="SubmitDeleteTestForm">Yes</button>
                <span class="w-2"></span>
                <button type="button" class="btn btn-default bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black" data-dismiss="modal">No</button>
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
        var dataTable = $('.datatable').DataTable(
        {
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 5,
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: '{{ route('get-lecttests') }}',
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
    $('#SubmitCreateTestForm').click(function(e)
    {
        e.preventDefault();
        $.ajaxSetup(
            {
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax(
            {
            url: "{{ route('lecttests.store') }}",
            method: 'post',
            data: {
                    test_date: $('#test_date').val(),
                    test_type: $('#test_type').val(),
                    test_desc: $('#test_desc').val(),
                    test_time: $('#test_time').val(),
                },
            success: function(result)
            {
                if(result.errors)
                {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value)
                        {
                        $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                } else
                {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                            setTimeout(function()
                            {
                                $('.alert-success').hide();
                                $('#CreateTestModal').hide();
                            }, 500);
                }
            }
        });
    });

    //buttons for create
    $(document).ready(function()
    {
        $("#show_create").click(function ()
        {
            $( "#CreateTestModal" ).show();
        });
        $("#hide_create").click(function ()
        {
            $( "#CreateTestModal" ).hide();
        });
        $("#hide_create1").click(function ()
        {
            $("#CreateTestModal").hide();
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
                url: "/lecttests/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
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
                url: "/lecttests/"+id,
                method: 'PUT',
                data: {
                    title: $('#editTitle').val(),
                    description: $('#editDescription').val(),
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
                        setInterval(function(){
                            $('.alert-success').hide();
                            $('#EditTestModal').hide();
                        }, 400);
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
            $.ajax({
                url: "/lecttests/"+id,
                method: 'DELETE',
                success: function(result) {
                    setTimeout(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteTestModal').hide();
                        location.reload();
                    }, 400);

                }
            });
        });
    });
</script>


@endsection
