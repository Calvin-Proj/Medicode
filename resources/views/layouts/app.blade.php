<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Stylesheets-->
    <link href="{{ url('/css/datatable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <<!--Replace with your tailwind.css once created-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Button Extension Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <title>NMU Test Schedular</title>
    </head>
    <body class="bg-primary">
        <nav class=" bg-secondary text-white flex justify-between mb-5 h-14">
            <ul class="flex items-center">
                <li>
                    <!--home/dashboard button-->
                       <x-home-button/>
                </li>
                <!--usertype navbar connection-->
                            @switch(auth()->user()->usertype)
                                @case('admin')
                                    <a href="{{ route('adminmanagemodules')}}" class="p-3">Manage Modules</a>
                                    <a href="{{ route('adminmanagevenues')}}" class="p-3">Manage Venues</a>
                                    <a href="{{ route('adminmanagelecturers')}}" class="p-3">Manage Lecturers</a>
                                    <a href="{{ route('adminmanageinvigs')}}" class="p-3">Manage Invigalators</a>
                                    <a href="{{ route('adminmanagestudents')}}" class="p-3">Manage Students</a>
                                    @break
                                @case('lecturer')
                                    <a href="{{ route('lecturermanagetest')}}" class="p-3">Manage Tests</a>
                                    <a href="{{ route('lecturermanagesicktest')}}" class="p-3">Manage Sick Notes</a>
                                    <a href="{{ route('lecturermanageattend')}}" class="p-3">View Attendants</a>
                                    <a href="{{ route('lecturermanagemiscon')}}" class="p-3">View Misconduct</a>

                                    @break
                                @case('invig')
                                    <a href="{{ route('invigschedules')}}" class="p-3">Invigilations Schedule</a>
                                    <a href="{{ route('invigmisconduct')}}" class="p-3">Submit Misconduct</a>
                                    <a href="{{ route('invighours')}}" class="p-3">Submit Hours</a>
                                    @break
                                @case('student')
                                            <x-test-sched-ico/>
                                            <x-stud-sick-ico/>
                                    @break
                                @default
                            @endswitch
                            <span class="w-8"></span>
                            <li>
                                <img class="object-contain py-1.5 w-36" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
                            </li>
                    </li>
                </ul>
            <ul class= "flex items-center">
                @auth
                    <li>
                       <x-dropdown-menu/>
                    </li>
                @endauth
            </ul>
        </nav>

    </body>
    <main class="px-4 py-2">
        @yield('content')
    </main>

</html>
