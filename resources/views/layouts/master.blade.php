<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>@yield('title', 'Geography Quiz')</title>
    <meta name="description" content="World Geography Quiz">
    <meta name="author" content="Michael Patrick Hall">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/frameworks/skeleton/normalize.css">
    <link rel="stylesheet" href="css/frameworks/skeleton/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/myjs.js"></script>

    @stack('head')

  </head>

  <body>

    <div class="container">

      <!-- Header Section -->

      <header>
        <div class="row">
          <div class="twelve columns">
            <h1>Geography Quiz</h1>
          </div>
        </div>
      </header>

      @yield('content')

    <!-- End of Main Container Section -->

    </div>

  @stack('body')

  </body>
</html>
