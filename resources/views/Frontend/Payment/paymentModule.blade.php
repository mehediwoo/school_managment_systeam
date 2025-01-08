<style>
    .payment-methods {
        margin: 20px 2px;
        display: flex;
        justify-content: center;
    }

    .payment-methods img{
        width: 80px;
        height: 50px;
    }
</style>
<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                @php
                    $backend_setting=App\Models\BackendSettings::first();
                @endphp
                <img src="{{asset($backend_setting->logo)}}" alt="Logo">
                <h2>{{ Auth::user()->name }}</h2>
                <button type="button" class="footer-btn bg-dark-low"
                data-bs-dismiss="modal" style="background-color: white">X</button>
            </div>

            <div class="modal-body">

                <div class="payment-methods">
                    <form action="{{ route('bkash-create-payment') }}" method="get" style="margin-right: 4px">
                        <input type="hidden" name="amount" id="pay_amount" >
                        <input type="hidden" name="amountId" id="pay_id" >
                        <button type="submit" class="btn btn-outline-secondary pbutton">
                            <img src="{{asset('Backend/image/logo/bkash.png')}}" alt="bkash">
                        </button>
                    </form>

                    <form action="{{ route('bkash-create-payment') }}" method="get" style="margin-right: 4px">
                        <input type="hidden" name="amount" id="pay_amount" >
                        <input type="hidden" name="amountId" id="pay_id" >
                        <button type="submit" class="btn btn-outline-secondary pbutton">
                            <img src="{{asset('Backend/image/logo/Nagad-Logo.wine.png')}}" alt="nagad">
                        </button>
                    </form>

                    <form action="{{ route('bkash-create-payment') }}" method="get" style="margin-right: 4px">
                        <input type="hidden" name="amount" id="pay_amount" >
                        <input type="hidden" name="amountId" id="pay_id" >
                        <button type="submit" class="btn btn-outline-secondary pbutton">
                            <img src="{{asset('Backend/image/logo/rocket.png')}}" alt="rocket">
                        </button>
                    </form>

                    <form action="" method="get" style="margin-right: 4px">
                        <input type="hidden" name="amount" id="pay_amount" >
                        <input type="hidden" name="amountId" id="pay_id" >
                        <button type="submit" class="btn btn-outline-secondary pbutton">
                            <img src="https://via.placeholder.com/80x40?text=Upay" alt="Upay">
                        </button>
                    </form>

                    <form action="" method="get" style="margin-right: 4px">
                        <input type="hidden" name="amount" id="pay_amount" >
                        <input type="hidden" name="amountId" id="pay_id" >
                        <button type="submit" class="btn btn-outline-secondary pbutton">
                            <img src="https://via.placeholder.com/80x40?text=Upay" alt="Upay">
                        </button>
                    </form>

                </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary form-control" name="amount" id="pay_amount1">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
