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
                    <form action="{{ route('home') }}" method="get" >
                        <button type="submit" class="inline-flex h-full py-4 px-3 hover:bg-white hover:text-primary focus:outline-none focus:text-highlight">
                            <div class="flex items-center">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                </svg>
                                <span class="w-2">
                                </span>
                                Home
                            </div>
                        </button>
                    </form>
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
                                <form action="{{ route('studenttestsched') }}" method="get" >
                                    <button type="submit" class="inline-flex h-full py-4 px-3 hover:bg-white hover:text-primary focus:outline-none focus:text-highlight">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.8A7.97 7.97 0 005.5 4c-1.25 0-2.44.29-3.5.8v10a7.97 7.97 0 013.5-.8c1.67 0 3.22.51 4.5 1.39A7.96 7.96 0 0114.5 14c1.25 0 2.44.29 3.5.8v-10a7.97 7.97 0 00-3.5-.8c-1.25 0-2.44.29-3.5.8V12a1 1 0 11-2 0V4.8z"/>
                                            </svg>
                                            <span class="w-2">
                                            </span>
                                            View Test Schedule
                                        </div>
                                    </button>
                                </form>
                                <form action="{{ route('studentbooksicktest') }}" method="get" >
                                    <button type="submit" class="inline-flex h-full py-4 px-3 hover:bg-white hover:text-primary focus:outline-none focus:text-highlight">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-8 8a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4L8 12.58l7.3-7.3a1 1 0 011.4 0z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="w-2">
                                            </span>
                                            Book Sick Test
                                        </div>
                                    </button>
                                </form>
                                    @break
                                @default
                            @endswitch
                    </li>
                </ul>
            <ul class= "flex items-center">
                @auth
                    <li>
                            <a href="" class="p-3 hover:text-highlight">{{auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="inline px-3 py-4 hover:bg-white hover:text-primary h-full border-none focus:outline-none focus:text-highlight">
                            @csrf
                            <button type="submit">Logout</button>
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
