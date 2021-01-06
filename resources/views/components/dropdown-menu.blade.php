<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.dropdown:hover .dropdown-content {display: block;}

</style>
</head>
<body>
<div class="dropdown flex-auto justify-center px-4">
  <div class="flex items-center">
    <button class="dropbtn p-4">{{auth()->user()->name}}</button>

    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </div>


  <div class="dropdown-content flex-auto justify-center rounded-lg p-4 shadow-xl bg-white hidden absolute">

    <a href="/lecturer/edit{{auth()->user()->id}}" class="hover:bg-secondary hover:text-white text-black p-2 py-2 block">Account Settings</a>


    <form action="{{ route('logout') }}" method="post" class="flex min-width-max">
      @csrf
       <button type="submit" class="inline min-width-full h-full text-black flex-auto p-2 hover:bg-secondary hover:text-white py-2">Logout</button>
   </form>
  </div>
</div>

</body>
</html>



