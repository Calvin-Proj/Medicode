@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataTables</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!--Replace with your tailwind.css once created-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Button Extension Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <style>
        /* Overrides to match the Tailwind CSS */

        .dataTables_wrapper {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem
        }

        table.dataTable.no-footer {
            border-bottom-width: 1px;
            border-color: #d2d6dc
        }

        table.dataTable tbody td, table.dataTable tbody th {
            padding: 0.75rem 1rem;
            border-bottom-width: 1px;
            border-color: #d2d6dc
        }

        div.dt-buttons {
            padding: 1rem 1rem 1rem 0;
            display: flex;
            align-items: center
        }

        .dataTables_filter, .dataTables_info {
            padding: 1rem
        }

        .dataTables_wrapper .dataTables_paginate {
            padding: 1rem
        }

        .dataTables_filter label input {
            padding: 0.5rem;
            border-width: 2px;
            border-radius: 0.5rem
        }

        .dataTables_filter label input:focus {
            box-shadow: 0 0 0 3px rgba(118, 169, 250, 0.45);
            outline: 0
        }

        table.dataTable thead tr {
            border-radius: 0.5rem
        }

        table.dataTable thead tr th:not(.text-center) {
            text-align: left
        }

        table.dataTable thead tr th {
            background-color: #edf2f7;
            border-bottom-width: 2px;
            border-top-width: 1px;
            border-color: #d2d6dc
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.next:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:not(.disabled), button.dt-button {
            transition-duration: 150ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #374151 !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.75rem;
            font-weight: 600;
            align-items: center;
            display: inline-flex;
            border-width: 1px !important;
            border-color: #d2d6dc !important;
            border-radius: 0.375rem;
            background: #ffffff;
            overflow: visible;
            margin-bottom: 0
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.next:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.next:hover:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:focus:not(.disabled), .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled), button.dt-button:focus, button.dt-button:focus:not(.disabled), button.dt-button:hover, button.dt-button:hover:not(.disabled) {
            background-color: #edf2f7 !important;
            border-width: 1px !important;
            border-color: #d2d6dc !important;
            color: #374151 !important
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:not(.disabled) {
            background: #6875f5 !important;
            color: #ffffff !important;
            border-color: #8da2fb !important
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #8da2fb !important;
            color: #ffffff !important;
            border-color: #8da2fb !important
        }

        .dataTables_length select {
            padding: .25rem;
            border-radius: .25rem;
            background-color: #edf2f7;
        }

        .dataTables_length {
            padding-top: 1.25rem;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

<!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
    <!--Title-->
    <h1 class="font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
        Responsive <a class="underline mx-2" href="https://datatables.net/">DataTables.net</a> table for Tailwind CSS / Laravel / Yajra Datatable
    </h1>
    <!--Card-->
    <div id='recipients' class="mt-6 lg:mt-0 rounded shadow bg-white">
        <table id="example">
            <thead>
            <tr>
                <th data-priority="1">Name</th>
                <th data-priority="2">Position</th>
                <th data-priority="3">Office</th>
                <th data-priority="4">Age</th>
                <th data-priority="5">Start date</th>
                <th data-priority="6">Salary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--/Card-->
</div>
<!--/container-->

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        let table = $('#example').DataTable({
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        }).columns.adjust().responsive.recalc();
    });
    </script>
</body>
    @endsection

</div>
