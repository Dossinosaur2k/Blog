<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Blog Website Template</title>


    <!-- Styles bootstrap-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  </head>

   <!-- Header -->
   <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/"><h2>Moon Crypto<em>.</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item  @if ( Request::is('/') ) active @endif">
              <a class="nav-link" href="/">Home
                <span class="sr-only"></span>
              </a>
            </li> 
            
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link @if ( Request::is('blog/*') || Request::is('blog*')) active @endif" href="/blog?page=1">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="team.html">Authors</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <script> 
 
  </script>
  </header>