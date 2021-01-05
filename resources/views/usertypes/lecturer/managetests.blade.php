@extends('layouts.app')

@section('content')
<div class="container bg-white rounded-sm">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">


                    <div class="card-test_date card-body flex justify-end p-2" x-data="{ open: false }">
                        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">
                            Create Test
                        </button>
                            <!-- Create Test Model -->
                            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
                                <div class="h-auto mx-2 text-left bg-secondary rounded-sm shadow-xl md:max-w-xl border-2 border-none z-10" @click.away="open = false">
                                    <div class="modal-content">
                                        <!-- Model Header -->
                                        <div class="">
                                            <div class="flex flex-wrap justify-center bg-primary content-start">
                                                <img class="w-36 rounded-sm" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
                                            </div>
                                            <div class="flex justify-end p-1">
                                                <button type="button" @click="open = false">
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
                                                        <x-date-picker/>
                                                        </div>
                                                            <div class="flex justify-start">
                                                            <span class="w-36"></span>
                                                            <x-time-picker/>
                                                            </div>
                                                                <div class="form-group flex justify-start p-2 text-white">
                                                                <label for="test_type">Test Type:</label>
                                                                <span class="w-16"></span>
                                                                Sick:
                                                                <span class="w-2"></span>
                                                                <input type="checkbox" class="form-control h-6 w-6" name="test_type" id="Edittest_type">
                                                                <span class="w-2"></span>
                                                                Normal:
                                                                <span class="w-2"></span>
                                                                <input type="checkbox" class="form-control h-6 w-6" name="test_type" id="Edittest_type">
                                                                </div>
                                                                    <div class="form-group flex justify-start p-2 text-white">
                                                                    <label for="test_desc">Test Description: </label>
                                                                    <span class="w-3"></span>
                                                                    <textarea class="form-control w-60 text-gray-600 resize-y" name="test_desc" id="test_desc">
                                                                    </textarea>
                                                                    </div>
                                            </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer flex flex-wrap justify-end p-4">
                                                <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1" id="SubmitCreateTestForm">Create</button>
                                                <span class="w-2"></span>
                                                <button type="button" class="bg-primary rounded-lg text-white p-1" @click="open = false">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="table-responsive z-0">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Test Date</th>
                                    <th>Test Type</th>
                                    <th>Test Description</th>
                                    <th class="text-center px-20">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
                <div id="EditTestModalBody">

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
                            $('#CreateTestModal').modal('hide');
                            location.reload();
                        }, 2000);
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
                url: "tests/"+id,
                method: 'PUT',
                data: {
                    test_date: $('#test_date').val(),
                    test_type: $('#test_type').val(),
                    test_desc: $('#test_desc').val(),
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
                        }, 2000);
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
                url: "tests/"+id,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteTestModal').hide();
                    }, 1000);
                }
            });
        });
    });
</script>
@endsection
