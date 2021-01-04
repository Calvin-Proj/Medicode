<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {

  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {display: block;}


</style>
</head>
<body>
<div class="dropdown relative flex-auto justify-center px-4">
  <div class="flex items-center">
  <button class="dropbtn">{{auth()->user()->name}}</button>

  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
</svg>
   </div>

  <div class="dropdown-content flex-auto justify-center rounded-lg p-2 shadow-xl">
    <a href="#" class="hover:bg-secondary hover:text-white">Account Settings</a>
    <form action="{{ route('logout') }}" method="post" class="flex min-width-max">
      @csrf
       <button type="submit" class="inline min-width-full h-full border-none focus:outline-none text-black flex-auto p-2 hover:bg-secondary hover:text-white">Logout</button>
   </form>
  </div>
</div>

</body>
</html>



