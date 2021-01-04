@extends('layouts.app')

@section('content')
<div class="container bg-white flex justify-center p-8">
    <table id="LecturerTest">
        <thead>
            <tr>
                <th>Test ID</th>
                <th>Test Date</th>
                <th>Test Type</th>
                <th>Test Description</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

</div>

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
<script>
    let table = $('#LecturerTest').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          dom: 'Blfrtip',
          ajax: "{{ route('ajaxTestLectGet') }}",
          columns: [
              {data: 'testid'},
              {data: 'test_date'},
              {data: 'test_type'},
              {data: 'test_desc'},
              {
                  data: 'action',
                  name: 'action',
                  orderable: true,
                  searchable: true
              },
          ]
    }).columns.adjust().responsive.recalc();
</script>

@endsection
