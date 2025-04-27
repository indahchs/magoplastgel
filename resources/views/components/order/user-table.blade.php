@props(['orders'])

@php
    $order_status_message = [
        'pending' => 'Menunggu Pembayaran',
        'paid' => 'Pembayaran Diterima',
        'shipped' => 'Barang Dikirim',
        'arrived' => 'Barang Diterima'
    ];

    $order_status_color = [
        'pending' => 'warning',
        'paid' => 'info',
        'shipped' => 'primary',
        'arrived' => 'success'
    ];
@endphp

@foreach ($orders ?? [] as $order)
    @php
        $index = $loop->index;
    @endphp
    @foreach ($order->orderItems as $item)
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>#{{ $order->order_number }}</h4>
                <h4 class="text-secondary">{{ $order->created_at->toDayDateTimeString() }}</h4>
            </div>

            <div class="card-body">
                <div class="media">
                    <img class="mr-3"
                        src="/storage/{{ $item->product->productImages[0]->path ?? "" }}"
                        alt="{{ $item->product->name ?? "" }}" title="{{ $item->product->name ?? "" }}" width="56" height="56">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $item->product->name ?? "" }}</h5>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">{{ $item->quantity }} pcs</p>
                            <p class="mb-0 rupiah text-primary">{{ $item->price }}</p>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row justify-content-end ">
                    <div class="col-md-10 col-xs-6 mb-1">
                        <h6 class="mb-0 text-right"><strong>Total pesanan:</strong></h6>
                    </div>
                    <div class="col-md-2 col-xs-6 ">
                        <h5 class="mb-0 text-right rupiah text-primary font-weight-bold">{{ $order->transaction->gross_amount }}</h5>
                    </div>
                </div>
                <div class="row justify-content-end mt-3">
                    @if ($order->status == 'shipped')
                    <button class="btn btn-outline-primary mr-2 tracking-button" data-id="{{ $order->id }}">
                        Lacak
                    </button>
                    @endif
                    @if ($order->status == 'arrived')
                        <a href="/product" class="btn btn-primary mr-2" >
                            Beli Lagi
                        </a>
                    @elseif($order->status == 'pending')
                        <button class="btn btn-outline-primary mr-2 " id="pay-button-{{ $index }}">
                            Bayar Sekarang
                        </button>
                        @php
                            $snapToken = $order->transaction->midtrans_response;
                        @endphp

                        <script type="text/javascript">
                        // For example trigger on button clicked, or any time you need
                            var payButton = document.getElementById('pay-button-{{ $index }}');
                            payButton.addEventListener('click', function () {
                                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                                window.snap.pay('{{ $snapToken }}');
                                // customer will be redirected after completing payment pop-up
                            });

                        </script>
                    @endif

                </div>


            </div>
        </div>
    @endforeach




@endforeach


