
        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{asset('build/assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('build/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{asset('build/assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- STICKY js -->
        @vite('resources/assets/js/sticky.js')

        <!-- SIDEBAR JS -->
        <script src="{{asset('build/assets/plugins/sidebar/sidebar.js')}}"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('build/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll.js')}}"></script>
        <script src="{{asset('build/assets/plugins/p-scroll/pscroll-1.js')}}"></script>


        <script>
            document.getElementById('checkAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.branch-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        </script>
 <!-- SELECT2 JS -->
 <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
 @vite('resources/assets/js/select2.js')

 <!-- DATA TABLE JS-->
 <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/jszip.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
 @vite('resources/assets/js/table-data.js')




@yield('scripts')

