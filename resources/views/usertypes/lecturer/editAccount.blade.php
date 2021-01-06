@extends('layouts.app')

@section('content')

<h3>Edit account Information</h3>
<br>
<div class="flex justify-center bg-white shadow overflow-hidden border-4 pt-6 m-12">
    <x-guest-layout>
       
    
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
    
                <!-- Password -->
                <div class="mt-4">
                    <label for="Password" class="text-black">Password</label>
                    <input type="text" value="{{auth()->user()->password}}" name="password" id="password" size="50" class="block mt-1 w-full border-gray-400" required autocomplete="new-password" >
                   
                </div>
    
                <!-- Confirm Password -->
    
                <div class="flex items-center mt-10">
                    <x-button class="rounded-none hover:bg-yellow">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
                <div>
                </div>
        
    </x-guest-layout>
</div>
@endsection
