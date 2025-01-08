@php
    use Carbon\Carbon;
    $year = Carbon::now()->format('Y');
@endphp

<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
           <div class="col-lg-12 col-sm-12  text-center ">
               Copyright © {{ $year }} <a href="#">BTSSD</a>.  All rights reserved.
           </div>
        </div>
    </div>
</footer>
