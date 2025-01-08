<script src="{{asset('Backend/js/jquery-3.3.1.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('Backend/js/plugins.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('Backend/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('Backend/js/bootstrap.min.js')}}"></script>
<!-- Counterup Js -->
<script src="{{asset('Backend/js/jquery.counterup.min.js')}}"></script>
<!-- Moment Js -->
<script src="{{asset('Backend/js/moment.min.js')}}"></script>
<!-- Waypoints Js -->
<script src="{{asset('Backend/js/jquery.waypoints.min.js')}}"></script>
<!-- Scroll Up Js -->
<script src="{{asset('Backend/js/jquery.scrollUp.min.js')}}"></script>
<!-- Full Calender Js -->
<script src="{{asset('Backend/js/fullcalendar.min.js')}}"></script>
<!-- Chart Js -->
{{-- <script src="{{asset('Backend/js/Chart.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Custom Js -->
<script src="{{asset('Backend/js/main.js')}}"></script>
<!-- Data Table Js -->
{{-- <script src="js/jquery.dataTables.min.js"></script> --}}
<!-- Date Picker Js -->
<script src="{{asset('Backend/js/datepicker.min.js')}}"></script>
<!-- Select 2 Js -->
<script src="{{asset('Backend/js/select2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var ctx = document.getElementById('student-chart-institute').getContext('2d');
    var item_female = $('#item_female').text();
    var item_male = $('#item_male').text();
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Female Students', 'Male Students'],
            datasets: [{
                data: [item_female, item_male],
                backgroundColor: ['#4e73df', '#f6c23e'],
                hoverBackgroundColor: ['#2e59d9', '#f4b619'],
                borderWidth: 1,
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 60, // Controls the size of the hole in the middle of the doughnut
            legend: {
                display: true
            }
        }
    });
</script>
@yield('js')

