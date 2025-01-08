@if (!empty($getFund))
    @foreach($getFund as $key=>$row)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $row->course->course_name }}</td>
        <td>{{ $row->session->session_name }}</td>
        <td>{{ $row->pay_for }}</td>
        <td>৳ {{ $row->amount }}</td>
        <td>{{ $row->status }}</td>
        <td>
            @if ($row->status=='Paid')
                @foreach ($row->availableAmount as $data)
                <p>{{ $data->pay_mode }}</p>
                @endforeach

            @else
            <a type="button" id="pay_btn" class="btn btn-primary Payment" data-bs-toggle="modal" data-id="{{ $row->id }}"
                data-amount="{{ $row->amount }}"
                data-bs-target="#payment-modal">
            Pay
            </a>
            @endif
        </td>
        <td>
            <a href="/Registration/fund/voucher/Pdf/{{ $row->id }}" target="_blank" onclick="printVoucher(event)">Print Voucher</a>
        </td>
        <td>
            @if ($row->status=='Pending')
                <a href="{{ route('fund_delete',$row->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            @endif
        </td>
    </tr>
    @endforeach
@endif
