 <!-- Footer Area Start Here -->
 <footer class="footer-wrap-layout1">
    @php
    $backend_setting=App\Models\BackendSettings::first();
@endphp
    <div class="copyright">© Copyrights <a href="#">{{$backend_setting->footer}}</a> {{$backend_setting->starting_year}}. All rights reserved.
    </div>
</footer>
