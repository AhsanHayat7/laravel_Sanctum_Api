<script src="{{asset('dashboard/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('dashboard/js/moment.min.js')}}"></script>
<!-- https://momentjs.com/ -->
<script src="{{asset('dashboard/js/utils.js')}}"></script>
<script src="{{asset('dashboard/js/Chart.min.js')}}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{asset('dashboard/js/fullcalendar.min.js')}}"></script>
<!-- https://fullcalendar.io/ -->
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script src="{{asset('dashboard/js/tooplate-scripts.js')}}"></script>
<script>
  let ctxLine,
    ctxBar,
    ctxPie,
    optionsLine,
    optionsBar,
    optionsPie,
    configLine,
    configBar,
    configPie,
    lineChart,
    barChart,  // Corrected this line
    pieChart;  // Corrected this line
    // DOM is ready
    $(function () {
        updateChartOptions();
        drawLineChart(); // Line Chart
        drawBarChart(); // Bar Chart
        drawPieChart(); // Pie Chart
        drawCalendar(); // Calendar

        $(window).resize(function () {
            updateChartOptions();
            updateLineChart();
            updateBarChart();
            reloadPage();
        });
    })
</script>
