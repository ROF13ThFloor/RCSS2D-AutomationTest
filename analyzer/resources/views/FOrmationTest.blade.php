
<html lang="en">

    <head>
        <title>Auto Test </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}"> --}}
    
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/info.css') }}">
        {{-- scripts --}}
        <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    
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
            @php
            $outputArray = json_decode($data, TRUE);
            $x=0;
            $y=0;
            @endphp
            
    
                <div id="content" class="p-4 p-md-5 pt-5">
                    <div style="margin: 10px">
                        <center>    <img class="cicdlogo" src="img/gitlabcicd.png" alt="KN2C">
                            <img class="teamlogo" src="img/2d.png" alt="KN2C">
            </center></div>
            <div style="margin-top: 60px; font-family: 'Cairo', sans-serif; font-size: 30px;"><center>Select repository for monitoring </center>
                </div>
                    <form action="Ftestcommite" method="post"><center id="matneselection" class="selectrepository"> </center>
                        <div class="select-box">
                            <div class="select-box__current" tabindex="1">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @foreach ($outputArray['group']['projects']['nodes'] as $item)
                                <div class="select-box__value">
                                    <input class="select-box__input" type="radio" id={{$item['id'][21] . $item['id'][22]}} value={{$item['id']}} name="ben" checked="checked" />
                                <p class="select-box__input-text">{{$item['name']}}</p>
                                </div>
                                @endforeach
                                <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                                    alt="Arrow Icon" aria-hidden="true" />
                            </div>
                            <ul class="select-box__list">
                                @foreach ($outputArray['group']['projects']['nodes'] as $item)
                                    <li>
            
                                        <label class="select-box__option" for={{ $item['id'][21] . $item['id'][22] }}
                                            aria-hidden="aria-hidden">{{ $item['name'] }}</label>
                                        @php
                                        $x = $x+1;
                                        @endphp
                                    </li>
            
                                @endforeach
            
                            </ul>
                        </div>
                        <center><button class="Repobuttun">Show Repository Test</button></center>
            </form>
                    
                </div>
           
       
    
            <script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
            <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('/js/main.js') }}"></script>
    </body>
    
    </html> 
    {{-- @php
    
    $outputArray = json_decode($data, TRUE);
    foreach ($outputArray['group']['projects']['nodes'] as $key) {
        # code...
        print_r($key['name']);
        print_r($key['id'][21] . $key['id'][22]);
    
        print_r('         ');
    }
    print_r('sssssssssss');
    // print_r($outputArray['group']['projects']['nodes']['id']);
    print_r($outputArray['group']['projects']['nodes']);
    // print_r($outputArray['group']['id']);
    // dd($data);
    // dd($response);
    
    
    @endphp --}}
    