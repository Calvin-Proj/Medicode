<!DOCTYPE html>
<html lang="en" class="antialiased">
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
    </style>
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal flex">

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
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
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
</html>
