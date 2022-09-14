@php
    $expWinrate=[];
    $winRate=[];
    $OppAvgGoals=[];
    $oppGoals=[];
    $avggoalzade=[];
    $goalzade=[];
@endphp
@foreach ($All_GameData as $key => $value)
    @foreach ($value as $item => $it)
        @php
            $expWinrate[$item]=$it['OurTeaminfo'][0]['ExpWinrate'];
            $winRate[$item]=$it['OurTeaminfo'][0]['WinRate'];
            $OppAvgGoals[$item]=$it['OppTeaminfo'][0]['AvgGoal'];
            $oppGoals[$item]=$it['OppTeaminfo'][0]['Goal'];
            $avggoalzade[$item]=$it['OurTeaminfo'][0]['AvgGoal'];
            $goalzade[$item]=$it['OurTeaminfo'][0]['Goal'];
        @endphp
    @endforeach
@endforeach
@php
    // print_r($expWinrate);
@endphp

<html lang="en">

<head>
    <title>monitoring </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}"> --}}
    {{--
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" type="text/css" href="{{ asset('/css/info.css') }}">
    {{-- scripts --}}
    <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">var exp =<?php echo json_encode($expWinrate); ?>;</script>
    <script type="text/javascript">var exp =<?php echo json_encode($expWinrate); ?>;</script>
    <script type="text/javascript">var winning =<?php echo json_encode($winRate); ?>;</script>
    <script type="text/javascript">var opponentAVGGoals =<?php echo json_encode($OppAvgGoals); ?>;</script>
    <script type="text/javascript">var opponentGoals =<?php echo json_encode($oppGoals); ?>;</script>
    <script type="text/javascript">var avgoalzade =<?php echo json_encode($avggoalzade); ?>;</script>
    <script type="text/javascript">var goalzade =<?php echo json_encode($goalzade); ?>;</script>





</head>


<body>
    <a id="BackToTopButton"></a>

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
            <div><center>
                <img class="cicdlogo" src="img/gitlabcicd.png" alt="KN2C">
                <img class="teamlogo" src="img/2d.png" alt="KN2C">

            </center>
            </div>
            <div class="row">
                @foreach ($All_GameData as $key => $value)
                @php
                    $commitID=$JobInformation[$key]['ComitTitle'];
                    $Auther_Name=$JobInformation[$key]['author_name'];
                    $Branch= $JobInformation[$key]['branch'];
                    $test_Type = 'Formation Test';
                    @endphp
                    <div class="col card card-1">
                        <li class="repoinfo">Gitlab Job ID : {{ $key }}</li>
                        <li class="repoinfo">Short Commit SHA : {{ $commitID }}</li>
                        <li class="repoinfo">Triggred Job by ? :{{ $Auther_Name }}</li>
                        <li class="repoinfo">Branch Name : {{ $Branch }}est Type :{{ $test_Type }}</li>
                        {{-- <p class="repoinfo">{{ $JobID }}</p><br>
                        --}}
                    </div>
                @endforeach
                    </div>
               
                    <div id="chartstag">
                    <h1 class="headertag">Charts <button id="hidetotalcharts" class="btn btn-primary"> <i class="fa fa-chevron-circle-down"></i></button> </h1>
                     <p id="paraghraphtag">here we have some charts that explain code progress in RCSS2D team </p>
                    </div>
                       <div id="totalcharts">
                        <div class="GeneralChart" id="ExpWinRateChart" style="width: 900px; height: 500px"></div>
                        <div class="GeneralChart" id="WinRateChart" style="width: 900px; height: 500px"></div> 
                        </div>
                    <div id="chartstag">
                    <h1 class="headertag">defense strategy <button id="hidedefcharts" class="btn btn-primary"> <i class="fa fa-chevron-circle-down"></i></button> </h1>
                     <p id="paraghraphtag">in this section we can improve with monitoring defense strategy !</p>
                    </div>
                        <div id="defcharts" >
                        <div class="GeneralChart" id="AVGoals" style="width: 900px; height: 500px"></div>
                        <div class="GeneralChart" id="Goals" style="width: 900px; height: 500px"></div>
                        </div>
                 
                    <div id="chartstag">
                    <h1 class="headertag">offensive strategy <button id="hideOffensecharts" class="btn btn-primary"> <i class="fa fa-chevron-circle-down"></i></button></h1>
                     <p id="paraghraphtag">in this section we can improve with monitoring offensive strategy !</p>
                    </div>
                        <div id="offensecharts">
                        <div class="GeneralChart" id="Avggoalzade" style="width: 900px; height: 500px"></div>
                        <div class="GeneralChart" id="Goalzade" style="width: 900px; height: 500px"></div>
                        </div>


        </div>
        

        <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>

