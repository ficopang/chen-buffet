@extends('master.layout')

@section('title', 'Transaction header')

@section('content')
    <div class="container my-5">
        <div class="card w-100 bg-dark border-0">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="d-inline">header Transaction</h4>
                <h4 class="text-right d-inline"><span class="badge badge-warning p-2 font-weight-normal">{{ $header->created_at }}</span></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-dark">
                        <tbody>
                        <tr>
                            <th width="20%" style="min-width: 150px">Invoice Number</th>
                            <th>: {{ $header->invoice_number }}</th>
                        </tr>
                        <tr>
                            <th>Cashier</th>
                            <th>: {{ $header->cashier->name }}</th>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <th>: {{ $header->paymentType->name }}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-dark">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Food Image</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php ($total = 0)
                            @foreach ($header->detail as $index => $data)
                            <tr>
                                <th scope="row" class="text-center">{{ $index+1 }}</th>
                                <td>
                                    <div class="d-flex justify-content-center" style="height: 150px">
                                        <img src="{{ Storage::url('foods/'.$data->food->image)}}" class="h-100" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{$data->food->name}}
                                    </div>
                                </td>
                                <td> {{$data->quantity}}</td>
                                <td>Rp {{$data->food->price}}</td>
                            </tr>
                            @php ($total += $data->quantity * $data->food->price)
                            @endforeach
                            <tr>
                                <th colspan="4">Total Price</th>
                                <th>Rp{{$total}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
