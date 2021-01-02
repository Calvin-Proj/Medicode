@extends('layouts.app')

@section('content')
<link href="{{ url('/css/datatable.css') }}" rel="stylesheet">
<div class="container bg-white min-w-full flex justify-center">
        <table id="managetest" class="px-4 flex-auto items-center min-w-full">
            <thead>
                <tr>
                    <th data-priority="1">Test ID</th>
                    <th data-priority="2">Test Date</th>
                    <th data-priority="3">Test Type</th>
                    <th data-priority="4">Test Description</th>
                    <th>Action</th>
                </tr>
            </thead >
                <tbody>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th></th>
                </tbody>
        </table>
        <form action="{{ route('lectureraddTest')}}" method="get">
            <div class="justify-center mt-4">
                <x-button class="">
                    {{ __('ADD TEST') }}
                </x-button>
            </div> 
          </form>       
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
