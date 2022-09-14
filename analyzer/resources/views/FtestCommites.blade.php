
@php
session_start();
$_SESSION['JobInformation'] = $finaljson;
// dd($finaljson);
@endphp 
<html lang="en">

<head>
<title>All Commites </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
{{--
<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}"> --}}

<link rel="stylesheet" type="text/css" href="{{ asset('/css/info.css') }}">
{{-- scripts --}}
<script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<style>
    body {
        background-color:white;
    }

</style>
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
                <a href="#"><span class="fa fa-home mr-3"></span> About</a>
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
            <center>    <img class="cicdlogo" src="img/gitlabcicd.png" alt="KN2C">
                <img class="teamlogo" src="img/2d.png" alt="KN2C">
</center></div>
        <center><div style="font-size: 200%"><p>select one commit to show results </p></div></center>
        <form action="seeResultsofFormationtest" method="post">
            <div class="boxes">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach ($finaljson as $item)
                    @if ($item['name'] == 'Run_getResults' and $item['status'] == 'success')
                        <input type="checkbox" id={{ $item['commit']['short_id'] }} value={{ $item['id'] }}  
                        name={{ $item['commit']['short_id'] }}>
                        <label for={{ $item['commit']['short_id'] }}>{{ $item['commit']['short_id'] }} <span
                                style="color: rgb(255, 0, 0)">
                                Commit message : </span>
                            <span style= "color: rgba(0, 0, 255, 0.61); font-style:italic; ">{{ $item['commit']['title'] }}</span></label>
                    @endif
                @endforeach
            </div>
            <div class="container">
                <div class="content1">
                    <p id="letscompare">Lets Compare !</p>
                    <svg id="more-arrows">
                        <polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 " />
                        <polygon class="arrow-middle"
                            points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 " />
                        <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 " />
                        <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 " />
                    </svg>
                </div>
            </div>
            {{-- arrow --}}

            {{-- arrow --}}
            <input type="hidden" id="pid" name="idnumber" value={{ $idnumber }}>
            <center><button class="SeeResults">See Commite Tests Compare</button></center>
        </form>
        

    </div>

    <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
