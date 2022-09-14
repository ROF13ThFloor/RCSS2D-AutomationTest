(function ($) {
    "use strict";
    $('.column100').on('mouseover', function () {
        var table1 = $(this).parent().parent().parent();
        var table2 = $(this).parent().parent();
        var verTable = $(table1).data('vertable') + "";
        var column = $(this).data('column') + "";

        $(table2).find("." + column).addClass('hov-column-' + verTable);
        $(table1).find(".row100.head ." + column).addClass('hov-column-head-' + verTable);
    });

    $('.column100').on('mouseout', function () {
        var table1 = $(this).parent().parent().parent();
        var table2 = $(this).parent().parent();
        var verTable = $(table1).data('vertable') + "";
        var column = $(this).data('column') + "";

        $(table2).find("." + column).removeClass('hov-column-' + verTable);
        $(table1).find(".row100.head ." + column).removeClass('hov-column-head-' + verTable);
    });


})(jQuery);



(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function () {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }

    });


})(jQuery);


// info page javascript
(function ($) {

    "use strict";

    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();
    $('#sidebar').toggle;
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    
    $('#hidetotalcharts').on('click', function () {
        // alert("clicked");
        $('#totalcharts').toggle('slow');
    });


    $('#hidedefcharts').on('click', function () {
        // alert("clicked");
        $('#defcharts').toggle('slow');
    });
    $('#hideOffensecharts').on('click', function () {
        // alert("clicked");
        $('#offensecharts').toggle('slow');
    });
    
})(jQuery);

// charts
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawExpWinrateChart);
google.charts.setOnLoadCallback(drawWinrateChart);

google.charts.setOnLoadCallback(drawGoalsChart);
google.charts.setOnLoadCallback(drawAvgGoalsChart);
google.charts.setOnLoadCallback(drawOurAvgGoalsChart);
google.charts.setOnLoadCallback(drawOurGoalsChart);


$.each(GameWLDData, function(index) { 
    // alert(GameWLDData[index]['DCount']);
    google.charts.setOnLoadCallback(function() { DrawWLDChart(GameWLDData[index] , index); });
    });
    
    
    function DrawWLDChart(data , index) {
        var ChartWinRate = new Array();
        // console.log(exp)
        ChartWinRate[0] = ['Game Status', 'Count'];
        var i=1;
        $.each(data, function( index, value ) { 
            ChartWinRate[i]=[index,value];
            i++;
            });
        var data = google.visualization.arrayToDataTable(ChartWinRate);
        var tittle = 'Job Id :' + index;
        var options = { 
            title: tittle,
            titleTextStyle : {
                bold : true
            }
        };
      

        var chart = new google.visualization.PieChart(document.getElementById(index));

        chart.draw(data, options);
      }





function drawExpWinrateChart() {
    var ChartWinRate = new Array();
    // console.log(exp)
    ChartWinRate[0] = ['JobID', 'WinRate'];
    var i =1 ;
    $.each(exp, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++;
        });
        // console.log(ChartWinRate)
    var data = google.visualization.arrayToDataTable(ChartWinRate,false);

    var options = {
        title: 'Expected Win Rate(Our Team)',
        lineWidth :4,
        pointSize: 16,
        colors: ['#eeff00'],
        pointShape: { type: 'triangle', rotation: 180 },
        hAxis: {
            title: 'Formation Name '  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'Expected WinRate',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('ExpWinRateChart'));

    chart.draw(data, options);
}

function drawWinrateChart() {
    var ChartWinRate = new Array();
    // console.log(exp)
    ChartWinRate[0] = ['JobID', 'WinRate'];
    var i =1 ;
    $.each(winning, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++
        });
    var data = google.visualization.arrayToDataTable(ChartWinRate ,false);

    var options = {
        title: 'WinRate',
        lineWidth :4,
        pointSize: 16,
        hAxis: {
            title: 'Formation Name'  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'WinRate',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        colors: ['#59c438'],
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('WinRateChart'));

    chart.draw(data, options);
}


function drawAvgGoalsChart() {
    var ChartWinRate = new Array();
    // console.log(exp)
    ChartWinRate[0] = ['JobID', 'AvgGoals'];
    var i =1 ;
    $.each(opponentAVGGoals, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++
        });
    var data = google.visualization.arrayToDataTable(ChartWinRate ,false);

    var options = {
        title: 'Average Goals against of our Team',
        lineWidth :4,
        pointSize: 16,
        hAxis: {
            title: 'Formation Name'  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'Average goal against',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        colors: ['#ff0000'],
        pointShape: { type: 'triangle', rotation: 180 },
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('AVGoals'));

    chart.draw(data, options);
}

function drawGoalsChart() {
    var ChartWinRate = new Array();
    // console.log(exp)
    ChartWinRate[0] = ['JobID', 'Goals'];
    var i =1 ;
    $.each(opponentGoals, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++
        });
    var data = google.visualization.arrayToDataTable(ChartWinRate ,false);

    var options = {
        title: 'Goals against of our team ',
        colors: ['#ff0000'],
        lineWidth :4,
        pointSize: 16, 
        hAxis: {
            title: 'Formation Name'  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'Goals gainst',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('Goals'));

    chart.draw(data, options);
}

function drawOurAvgGoalsChart() {
    var ChartWinRate = new Array();
    // console.log(exp)
    ChartWinRate[0] = ['JobID', 'Goals'];
    var i =1 ;
    $.each(avgoalzade, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++
        });
    var data = google.visualization.arrayToDataTable(ChartWinRate ,false);

    var options = {
        title: 'Our Avgs Goals ',
        colors: ['#04ff00'],
        lineWidth :4,
        pointSize: 16, 
        hAxis: {
            title: 'Formation Name'  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'Our goals Avg',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };
    
    var chart = new google.visualization.AreaChart(document.getElementById('Goalzade'));

    chart.draw(data, options);
}


function drawOurGoalsChart() {
    var ChartWinRate = new Array();
    console.log(goalzade)
    ChartWinRate[0] = ['JobID', 'Goals'];
    var i =1 ;
    $.each(goalzade, function( index, value ) { 
        ChartWinRate[i]=[index,value];
        i++
        });
    var data = google.visualization.arrayToDataTable(ChartWinRate ,false);

    var options = {
        title: 'Our  Goals ',
        colors: ['#04ff00'],
        lineWidth :4,
        pointSize: 16, 
        hAxis: {
            title: 'Formation Name'  ,
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
          vAxis: {
            title: 'Goal Count',
            titleTextStyle :{
                bold :true,
                color: 'black'
            }
          },
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('Avggoalzade'));

    chart.draw(data, options);
}




// back to top

var btn = $('#BackToTopButton');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

