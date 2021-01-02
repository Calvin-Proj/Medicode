@extends('layouts.app')

@section('content')
<div class="flex container justify-center w-screen bg-white shadow overflow-hidden">
    <table id="managetest" class="px-4">
        
        <thead>
            <tr>
                <th data-priority="1">Test ID</th>
                <th data-priority="2">Test Date</th>
                <th data-priority="3">Test Type</th>
                <th data-priority="4">Test Description</th>
            </tr>
        </thead>
            <tbody>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
            </tbody>
    </table>
</div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <script>
        $(document).ready(function ()
        {
            let table = $('#managetest').DataTable({
                responsive: true,
                dom: 'Blfrtip',
                buttons:
                    [
                        'copy', 'excel', 'pdf'
                    ]
            }).columns.adjust().responsive.recalc();
        });
    </script>
</div>

@endsection
