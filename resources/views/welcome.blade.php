<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Covid-19 Kenyan data</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-header __web-inspector-hide-shortcut__">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Covid-19 Kenyan Data</h1>
                </div>
            </div>
        </div>
    </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="confirmed"></h3>
                                    <p>Confirmed Cases</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="recovered"></h3>
                                    <p>Recovered</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3 id="active"></h3>
                                    <p>Active Case</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="dead"></h3>
                                    <p>Dead</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                            <canvas id="bar-chart" height="300" width="577"></canvas>
                                    </div>
                                </div>
                            </div>
=                        </section>
                        <section class="col-lg-4 connectedSortable ui-sortable">
                            <div class="card-body">
                                <div class="tab-content p-0">
                                        <canvas id="myChart" height="250" width="350" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
    <div class="container">
        <table class="table table-bordered" id="laravel_datatable">
            <thead>
            <tr>
                <th>Date</th>
                <th>Cases</th>
                <th>Deaths</th>
                <th>Recovered</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="{{asset('assets/js/chart.js')}}"></script>
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/lodash.min.js')}}"></script>
<script>
    $('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');
    $(window).on('load', function(){
        setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
    });
    function removeLoader(){
        $( "#loadingDiv" ).fadeOut(500, function() {
            // fadeOut complete. Remove the loading div
            $( "#loadingDiv" ).remove(); //makes page more lightweight
        });
    }
</script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Poppins';
    /**
     * Transactions Graph and users weekly
     **/
    const spinners =
        `<div class="d-flex justify-content-around loading-spinner">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;
    //  let weekly = $(".weekly").val();
    $.get('https://disease.sh/v3/covid-19/countries/kenya', function(data) {
        console.log(data.deaths);
        $('#dead').html(data.deaths);
        $('#confirmed').html(data.cases);
        $('#recovered').html(data.recovered);
        $('#active').html(data.active);
    });
</script>
<script>
    $(document).ready(
        function(){
            showGraph();
            showBar();
            dataGraph();
        }
    );
    function showGraph() {
        $.get("https://disease.sh/v3/covid-19/countries/kenya",function(data){
            console.log(data);
            var name = ['Cases','Deaths','Recovered','Active'];
            var details = [];
            details.push(data.cases);
            details.push(data.deaths);
            details.push(data.recovered);
            details.push(data.active);
            console.log(name);
            console.log(details);
            var chartdata={
                labels: name,
                datasets: [
                    {
                        backgroundColor: ['#3498db','#e74c3c','#2ecc71','#f4b400'],
                        data: details
                    }
                ]
            };
            var options={
                title: {
                    display: true,
                    text: 'COVID-19 CORONAVIRUS KENYAN STATUS'
                },
                elements:{
                    arc: {
                        borderWidth: 0
                    }
                }
            };
            var graphTarget = $("#myChart");
            var graph=new Chart(graphTarget,{
                type: 'pie',
                data: chartdata,
                options:options
            });

        });
    }
    function showBar() {
        $.get("https://disease.sh/v3/covid-19/historical/kenya",function(data){
            var name =  _.keys(data.timeline.cases);
             var cases =  _.values(data.timeline.cases);
            var deaths =  _.values(data.timeline.deaths);
            var recovered =  _.values(data.timeline.recovered);
            console.log( _.values(data.timeline.cases));
            console.log(name);
            var chartdata={
                labels: name,
                datasets: [
                    {
                        label: "Cases",
                        backgroundColor: "#f4b400",
                        data:cases
                    },
                    {
                        label: "Deaths",
                        backgroundColor: "#e74c3c",
                        data: deaths
                    },
                    {
                        label: "Recovered",
                        backgroundColor: "#2ecc71",
                        data:recovered
                    },
                ]
            };
            var options={
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                        beginAtZero: true,
                        ticks: {
                            min: 0,
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'COVID-19 CORONAVIRUS KENYAN STATUS'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                },
            };
            var graphTarget = $("#bar-chart");
            var graph=new Chart(graphTarget,{
                type: 'bar',
                data: chartdata,
                options:options
            });

        });
    }
    function dataGraph(){
        $('.laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-datatable') }}",
            columns: [
                { data: 'date', name: 'date' },
                { data: 'cases', name: 'cases' },
                { data: 'recovered', name: 'recovered' },
                { data: 'deaths', name: 'deaths' }
            ]
        } );
    }

</script>
<script>
</script>
</body>
</html>
