@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <!-- modal div -->
                        <!-- Create Test Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Test Date</th>
                            <th>Test Type</th>
                            <th>Test Description</th>
                            <th>Test Time</th>
                            <th>Module Name</th>
                            <th>Venue Name</th>
                            <th class="text-center px-20">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!--modal-->
<!--modal-->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    <div class="relative mx-auto max-w-7xl h-screen w-full py-16">
      <!--content-->
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col bg-white outline-none focus:outline-none w-full h-full">
        <!--header-->
        <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
          <h3 class="text-3xl font-semibold">
            Test
          </h3>
          <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
        </div>
        <!--body-->
            <div class="p-6 flex flex-row h-full w-full row-auto flex-wrap items-center align-text-top">
                <div id="map" class="w-1/2 h-20"></div>
                <div class="flex flex-col align-text-top w-1/2 h-full">
                    <div class="px-4 text-xl font-semibold h-1/2 p-3">Test Details:</div>
                    <div class="px-4 text-xl font-semibold h-1/2 p-3">Seating Plan:</div>
                </div>
            </div>

        <!--footer-->
        <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
          <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-id')">
            Close
          </button>
          <button class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-id')">
            Save Changes
          </button>
        </div>
      </div>
    </div>
  </div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<!--modal-->
<!--modal-->
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        // init datatable.
        var dataTable = $('.datatable').DataTable(
        {
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
                {data: 'module_name', name: 'module_name'},
                {data: 'venue_name', name: 'venue_name'},
                {data: 'Actions', name: 'Actions',orderable:false,searchable:false,sClass:'text-center'},
            ]
    });
    });
</script>
<script type="text/javascript">
    function toggleModal(modalID){
      document.getElementById(modalID).classList.toggle("hidden");
      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
      document.getElementById(modalID).classList.toggle("flex");
      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
  </script>

@endsection
