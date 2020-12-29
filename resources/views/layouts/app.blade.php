<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NMU Test Schedular</title>
    </head>
    <body class="bg-gray-400">
        <nav class="p-6 bg-white flex justify-between mb-5">

                <!--usertype navbar connection-->
                <ul class= "flex items center">
                    <li>
                            <a href="/" class="p-3">Home</a>
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
                                    <a href="{{ route('studenttestsched')}}" class="p-3">View Test Schedule</a>
                                    <a href="{{ route('studentbooksicktest')}}" class="p-3">Book Sick Test</a>
                                    @break
                                @default

                            @endswitch
                    </li>

                </ul>

            <ul class= "flex items center">
                @auth
                    <li>
                            <a href="" class="p-3">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>

                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login')}}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register')}}" class="p-3">Register</a>
                    </li>
                @endguest



            </ul>
        </nav>

    </body>
    <main class="px-4 py-2">
        @yield('content')
    </main>


</html>
