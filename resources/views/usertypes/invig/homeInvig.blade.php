@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>


<body class="bg-primary leading-normal tracking-normal mt-12">



<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5 rounded-lg">

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-pencil-alt fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Tests Invigilated</h5>
                        <h3 class="font-bold text-3xl text-white">10 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-user-graduate fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Upcoming Test Countdown</h5>
                        <h3 class="font-bold text-3xl text-white">322 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-band-aid	fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Misconducts Submitted</h5>
                        <h3 class="font-bold text-3xl text-white">1 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-green-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-400"><i class="fas fa-check fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Something</h5>
                        <h3 class="font-bold text-3xl text-white">6 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-book fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Something</h5>
                        <h3 class="font-bold text-3xl text-white">3 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-green-400 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-400"><i class="fas fa-check fa-3x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold uppercase text-white">Something</h5>
                        <h3 class="font-bold text-3xl text-white">0 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>

    </div>


    <div class="flex flex-row flex-wrap flex-grow mt-2">

        <div class="w-full md:w-1/2 xl:w-2/3 p-6">
            <!--Table Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
                <div class="bg-yellow-400 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-black">Upcoming Tests</h5>
                </div>
                <div class="p-5">
                    <table class="w-full p-5 text-gray-700">
                        <thead>
                        <tr>
                            <th class="text-left text-blue-900">Test</th>
                            <th class="text-left text-blue-900">Date</th>
                            <th class="text-left text-blue-900">Time</th>
                            <th class="text-left text-blue-900">Available</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Obi Wan Kenobi</td>
                            <td>14/02/21</td>
                            <td>14:30</td>
                            <td><input type="checkbox" id="available" name="available" value=""></td>
                        </tr>
                        <tr>
                            <td>Greedo</td>
                            <td>16/02/21</td>
                            <td>08:45</td>
                            <td><input type="checkbox" id="available" name="available" value=""></td>
                        </tr>
                        <tr>
                            <td>Darth Vader</td>
                            <td>17/02/21</td>
                            <td>11:15</td>
                            <td><input type="checkbox" id="available" name="available" value=""></td>
                        </tr>
                        </tbody>
                    </table>

                    <p class="py-2"><a href="#">Expand List...</a></p>

                </div>
            </div>
            <!--/table Card-->


        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">

            <div class="bg-white rounded-lg shadow-xl p-5 ">

                <x-date-time/>

            </div>

        </div>


    </div>
</div>
</div>







</body>

</html>
@endsection
