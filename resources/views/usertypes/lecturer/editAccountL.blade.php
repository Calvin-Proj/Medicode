@extends('layouts.app')

@section('content')



<div class="flex justify-center bg-white shadow overflow-hidden border-4 pt-6 m-12">
    
       
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="/lecturer/edit{{auth()->user()->id}}">
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

                <!-- Name -->
                <div>
                    <label for="name" class="text-black">Name</label>
    
                    <input type="text" value="{{auth()->user()->name}}" name="name" size="50" class="block mt-1 w-full border-gray-400" required autofocus>
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="text-black">Email</label>
    
                    <input type="text" value="{{auth()->user()->email}}" name="email" size="50" class="block mt-1 w-full border-gray-400" required>
                </div>
    
                <!--old Password -->
                <div class="mt-4">
                    <label for="Password" class="text-black">Current Password</label>
                    <input type="text" value="" name="currentPassword" id="currentPassword" size="50" class="block mt-1 w-full border-gray-400"  >        
                </div>
    
                 <!--change password checkbox -->

               <x-changePassword/>

                <!-- Confirm Password -->
    
                <div class="flex items-center mt-4">
                    <x-button class="rounded-none hover:bg-yellow">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
                <div>
            </div>   
</div>
@endsection
