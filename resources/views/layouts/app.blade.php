<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- CSS TailWind -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  <!-- Icon Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body style="background-color:#252b48;">

  <!-- Navbar start from here -->

  <nav class="flex items-center justify-between flex-wrap bg-gray-900 mx-5 mt-3">
    <div class="flex items-center flex-shrink-0 text-teal-200 mr-6">
      <a href="/home"
        id="nav-home"
        class="bg-gray-900 border-t-2 border-green-500 hover:bg-teal-900 hover:text-white ml-2 p-2 font-semibold text-xl tracking-tight">
        {{ config('app.name', 'Laravel') }}
      </a>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
      <div class="text-sm lg:flex-grow">
        <a href="/goals"
          id="nav-goals"
          class=" block lg:inline-block lg:mt-0 text-teal-500 hover:bg-gray-800 hover:text-teal-600 text-xl mx-1 p-2">
          <i class="fas fa-map-marker-alt mr-1"></i>
          <span class="mr-1 no-underline">Goals </span>
        </a>
        <a href="/tags"
          id="nav-tags"
          class="block lg:inline-block lg:mt-0 text-teal-500 hover:bg-gray-800 hover:text-teal-600 text-xl mx-1 p-2">
          <i class="fas fa-tags mr-1"></i>
          <span class="mr-1 no-underline">Tags </span>
        </a>
        {{$request_uri = "$_SERVER[REQUEST_URI]"}};
      </div>
      <div>
        @guest

        <a href="{{ route('login') }}"
          class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">
          {{ __('Login') }}
        </a>
        @if (Route::has('register'))

        <a href="{{ route('register') }}"
          class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">
          {{ __('Register') }}
        </a>
        @endif
        @else
        <div class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="text-green-700 fas fa-user"></i>
            <span class="text-white ml-2">{{ Auth::user()->name }}</span> <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </div>
        @endguest
      </div>
    </div>
  </nav>

  <!-- jQuery -->
  <script src="//code.jquery.com/jquery.js"></script>
  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!-- App scripts -->
  @stack('scripts')

  @yield('content')

  <script>
    var navbar = ["nav-home", "nav-home", "nav-home"]
    navbar.map( data => {
      $('#' + data).removeClass('border-t-2 border-green-500')
    })

    var active_navbar = ({!! json_encode($request_uri) !!}).split("/")[1]
    switch(active_navbar){
      case "home":
      $('#nav-home').addClass('border-t-2 border-green-500')
      break
      case "tags":
      $('#nav-tags').addClass('border-t-2 border-green-500')
      break
      case "goals":
      $('#nav-goals').addClass('border-t-2 border-green-500')
      break
      default:
      $('#nav-goals').addClass('border-t-2 border-green-500')
    }
  </script>

</body>

</html>