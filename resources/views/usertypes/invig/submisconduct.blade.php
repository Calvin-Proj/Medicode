@extends('layouts.app')

@section('content')
<body>
    <div class="flex justify-center bg-white shadow overflow-hidden border-4 pt-6 m-12 rounded-lg">



        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/invig/submisconduct">
            @csrf
                @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                   </div>
               @endif

              <!-- <img class="block h-14 w-14 justify-center" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man4-512.png" alt="avatar">-->

              <h3></h3>

            <!-- Header -->
            <div class="flex justify-center font-semibold text-lg">
                <label for="header">Enter Misconduct</label>
            </div>
            <!-- Name -->
            <div>
                <label for="user_id" class="text-black px-2 font-semibold">Enter student ID</label>

                <input type="text" value="" name="user_id" size="50" class="block mt-1 w-full border-gray-400 text-gray-600" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="test_id" class="text-black px-2 font-semibold">Enter Test ID</label>

                <input type="text" value="" name="test_id" size="50" class="block mt-1 w-full border-gray-400 text-gray-700" required>
            </div>

            
            <div class="mt-4">
                <label for="misconduct_desc" class="text-black px-2 font-semibold">Misconduct Description </label><br>
                <textarea class="mt-1 form-control w-full text-gray-600" name="misconduct_desc" >
                </textarea>
               
            </div>

            

        

            <!-- Confirm Password -->

            <div class="flex items-center mt-4">
                <x-button class="rounded-lg">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
            <div>
        </div>
</div>
</body>



@endsection
