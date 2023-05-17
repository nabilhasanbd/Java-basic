<div class="form-group">
    {!! Form::label('holding_no','Holding Number',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('holding_no', $holdingPayment->holding_no??null, ['class' => 'form-control', 'placeholder' => 'Holding Number' , 'readonly' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('client_no','Tax Code',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('client_no', $holdingPayment->client_no??null, ['class' => 'form-control', 'placeholder' => 'Tax Code', 'readonly' => 'true']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fiscal_year','Fiscal year',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('fiscal_year',$holdingPayment->fiscal_year??null,['class' => 'form-control', 'placeholder' => 'Fiscal year']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('bill_no','Bill ID',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('bill_no', $holdingPayment->bill_no??null,['class' => 'form-control', 'placeholder' => 'Bill no']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('period_of_bill','Quarter',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('period_of_bill', $holdingPayment->period_of_bill??null,['class' => 'form-control', 'placeholder' => 'Fiscal year']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('paid_date','Bill posting date',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('paid_date', $date??null,['class' => 'form-control', 'placeholder' => 'Date']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('bank_payment_date','Bank payment date',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('bank_payment_date', $holdingPayment->bank_payment_date??null,['class' => 'form-control', 'placeholder' => 'Date']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('bill_column', 'Period of bill', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::select('bill_column', ['0' => 'বকেয়া', '1' => 'বকেয়া সহ ১ম কোয়ার্টার', '2' =>'বকেয়া সহ ১ম-২য় কোয়ার্টার', '3' => 'বকেয়া সহ ১ম-৩য় কোয়ার্টার', '4' => 'বকেয়া সহ ১ম-৪র্থ কোয়ার্টার'], $holdingPayment->bill_column??null, ['class' => 'form-control', 'id' => 'bill_column']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('total', 'Amount', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('total', $holdingPayment->total??null, ['class' => 'form-control', 'placeholder' => 'Amount in Taka', 'id' => 'total']) !!}
    </div>
</div>

<a href="{{ action([\App\Http\Controllers\HoldingPaymentController::class, 'index']) }}" class="btn btn-info">Back to List</a>
{!! Form::submit('Save', ['class' => 'btn btn-info']) !!}

@push('scripts')
    <script>
        const taxcd = '{{ $holdingPayment->client_no }}';
        const fiscalYear = '{{ $holdingPayment->fiscal_year }}';
        const quarter = '{{ $holdingPayment->period_of_bill }}';
        const taxcd_base64 = btoa(encodeURIComponent(taxcd))
        const url = `{{ url("/holdings/quarterly-bill/get") }}?taxcd=${taxcd_base64}&fiscalYear=${fiscalYear}&quarter=${quarter}`;
        console.log(url);

        const updateTotalField = (billColumn) => {
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    let totalField = document.getElementById('total');
                    switch (billColumn) {
                        case '0':
                            totalField.value = data.paymentInfo.total_bill_0;
                            break;
                        case '1':
                            totalField.value = data.paymentInfo.total_bill_1;
                            break;
                        case '2':
                            totalField.value = data.paymentInfo.total_bill_2;
                            break;
                        case '3':
                            totalField.value = data.paymentInfo.total_bill_3;
                            break;
                        case '4':
                            totalField.value = data.paymentInfo.total_bill_4;
                            break;
                        default:
                            totalField.value = '';
                    }
                })

        };

        // Event listener for bill_column change
        const billColumnSelect = document.getElementById('bill_column');
        billColumnSelect.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            updateTotalField(selectedValue);
        });

        // Initial update of the total field based on the pre-selected bill_column value
        const preSelectedBillColumn = billColumnSelect.value;
        updateTotalField(preSelectedBillColumn);
    </script>
@endpush


