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
                sad
          </h3>
          <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-id')">
            Close
          </button>
        </div>
        <!--body-->
            <div class="container w-full h-full">
                <div id="map" class="w-full h-full"></div>
                    <div class="flex h-full">
                        <div id="right-panel"></div>
                        <div>
                            <div class="text-2xl px-2 font-bold"> Test Details </div>
                            <div class="grid grid-cols-3 gap-4  py-2 px-4">
                              
                              <div><label class="font-semibold">Lecturer:</label> {{$building->name}}</div>
                              <div><label class="font-semibold">Module Code:</label> {{$building->module_code}}</div>
                              <div><label class="font-semibold">Test Type:</label> {{$building->test_type}}</div>
                              <div><label class="font-semibold">Building Location:</label> {{$building->building_location}}</div>
                              <div><label class="font-semibold">Date:</label> {{$building->test_date}}</div>
                              <div><label class="font-semibold">Time: </label> {{$building->test_time}}</div>
                         
                            </div>
                            
                            <div class="text-2xl px-2 py-4 "> <label class="font-bold">Seating plan </label>- {{$building->no_of_seats}} seats</div>
                        </div>
                    </div>



                <div id="floating-panel" class="z-0">
                    <select id="start">
                      <option value="framesby"></option>
                    </select>
                    <select id="end">
                      <option value="{{$building->building_location}}"></option>
                    </select>
                </div>


        </div>
    </div>




        <!--footer-->
        <div class="">

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

<script>
   function initMap() {
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const directionsService = new google.maps.DirectionsService();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: { lat: 41.85, lng: -87.65 },
  });
  directionsRenderer.setMap(map);
  directionsRenderer.setPanel(document.getElementById("right-panel"));
  const control = document.getElementById("floating-panel");
  control.style.display = "block";
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  setTimeout(function(){calculateAndDisplayRoute(directionsService, directionsRenderer);}, 1200);


  document.getElementById("start").addEventListener("change", onChangeHandler);
  document.getElementById("end").addEventListener("change", onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  const start = document.getElementById("start").value;
  const end = document.getElementById("end").value;
  directionsService.route(
    {
      origin: start,
      destination: end,
      travelMode: google.maps.TravelMode.DRIVING,
    },
    (response, status) => {
      if (status === "OK") {
        directionsRenderer.setDirections(response);
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
}
</script>
<script>
    url: "{{ route('admods.store') }}",
            method: 'post',
            data: {
                module_code: $('#module_code').val(),
                module_name: $('#module_name').val(),
                module_year: $('#module_year').val(),
                },
</script>

@endsection
