<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                                <form action="{{ route('studentbooksicktest') }}" method="get" >
                                    <button type="submit" class="inline-flex h-full py-4 px-3 hover:bg-white hover:text-primary focus:outline-none focus:text-highlight">
                                        <div class="flex items-center">
                                            <x-stud-sick-ico/>
                                            <span class="w-2">
                                            </span>
                                            Book Sick Test
                                        </div>
                                    </button>
                                </form>
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
                            <a href="" class="p-3 hover:text-highlight">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="inline px-3 py-4 hover:bg-white hover:text-primary h-full border-none focus:outline-none focus:text-highlight">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>

    </body>
    <main class="px-4 py-2">
        @yield('content')
    </main>


</html>
