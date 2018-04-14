<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Custom CSS -->
  <link type="text/css" rel="stylesheet" href="css/app.css"

</head>
<body>
  <nav class="red" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">DenScout</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
          <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>

    @yield('content')

    <br>
    <br>

    <footer class="page-footer red">
      <div class="footer-copyright">
        <div class="container">
        Made by <a class="red-text text-lighten-3" href="http://sga.marist.edu">Marist SGA</a>
        </div>
      </div>
    </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</body>
</html>
