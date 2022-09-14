<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="{{asset('/css/demo.css')}}">
        <link rel="stylesheet" href="{{asset('/css/templatemo-style.css')}}">
            {{-- java scripts --}}

            <script type="text/javascript" src="{{asset('/js/modernizr.custom.86080.js')}}"></script>

    </head>
    <body>
        <div id="particles-js"></div>

<ul class="cb-slideshow">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>

<div class="container-fluid">
  <div class="row cb-slideshow-text-container ">
    <div class="tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section">
      <header class="mb-5"><h1>Compare Tools</h1></header>
      <P class="mb-5">As monitoring is an essential major in Continious Integration, a compare tool was always demanded.
        Here we have a tool to consider a number of repositories at a time and induct improvement or loss on every
        single factor.</P>


      <div class="tm-social-icons-container text-xs-center">
        <img class="kn2clogo" src="{{asset('/img/kn2c.jpeg')}}">
        <img class="teamlogo" src="{{asset('/img/2d.png')}}">
        <img class="gitlablogo" src="{{asset('/img/gitlabcicd.png')}}">
      </div>
      <div class="row form-section">

        <a href="login">
          <button>
            <span>Login</span>
          </button></a>

      </div>


    </div>
  </div>
  <div class="footer-link">
    <p>Copyright © 2020 ♥ <a href="http://kn2c.aras.kntu.ac.ir">KN2C</a> ♥ Robotics Team
    </p>
  </div>
</div>

    </body>
    <script type="text/javascript" src="{{asset('/js/particles.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
</html>
