<html lang="en">

  <head>
    <title>About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/info.css') }}">
    {{-- scripts --}}
    <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

  </head>


  <body>
   
    
    <div class="wrapper d-flex align-items-stretch">
      
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
          </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(img/bg_1.jpg);">
          <div class="user-logo">
            <div class="img" style="background-image: url(img/agent.png);"></div>
            <h3 style="font-size: 40px;">KN<span style="color: red;">2</span>C Team</h3>
          </div>
        </div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="home"><span class="fa fa-home mr-3"></span> About</a>
          </li>
          <li class="active">
            <a href="AutotestResult"><span class="fa fa-line-chart mr-3"></span> AutoTest</a>
          </li>
          <li class="active">
            <a href="FormationtestRepo"><span class="fa fa-line-chart mr-3"></span> FormationtestRepo</a>
        </li>


        </ul>

      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div>

          <center>
            <img class="cicdlogo" src="img/gitlabcicd.png" alt="KN2C">
            <img class="teamlogo" src="img/2d.png" alt="KN2C">
      
        </center>
        </div>
            <div class='progress'>
  <div class='progress_inner'>
    <div class='progress_inner__step'>
      <label for='step-1'>Why need test ? </label>
    </div>
    <div class='progress_inner__step'>
      <label for='step-2'>Tests Types</label>
    </div>
    <div class='progress_inner__step'>
      <label for='step-3'>How  ? </label>
    </div>
    <div class='progress_inner__step'>
      <label for='step-4'>Monitoring</label>
    </div>
    <div class='progress_inner__step'>
      <label for='step-5'>Improve Code</label>
    </div>
    <input checked='checked' id='step-1' name='step' type='radio'>
    <input id='step-2' name='step' type='radio'>
    <input id='step-3' name='step' type='radio'>
    <input id='step-4' name='step' type='radio'>
    <input id='step-5' name='step' type='radio'>
    <div class='progress_inner__bar'></div>
    <div class='progress_inner__bar--set'></div>
    <div class='progress_inner__tabs'>
      <div class='tab tab-0'>
        <h1>Why need test ?</h1>
        <p>Detecting defects/bugs before delivery guarantees the quality of the software. This makes tests prominent.</p>
      </div>
      <div class='tab tab-1'>
        <h1>Tests Types</h1>
        <p>This project is made of 2 test types. The first type contains a variety of formations and the other one is based on the AutoTest tool  .</p>
      </div>
      <div class='tab tab-2'>
        <h1>How  ?</h1>
        <p>To monitor the repository tests in KN2C Group you should select the demanded repository in the first step .</p>
      </div>
      <div class='tab tab-3'>
        <h1>Monitoring</h1>
        <p>In this Monitoring tool, there is important information (such as GA or Expected Winrate) about implemented tests that can be compared with other commits.</p>
      </div>
      <div class='tab tab-4'>
        <h1>Improve Code</h1>
        <p>By visualizing the procedure of coding, this tool will make the team's progress quicker.</p>
      </div>
    </div>
    
  </div>
</div>

      </div>

      <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
      <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('/js/main.js') }}"></script>
    </body>

</html>