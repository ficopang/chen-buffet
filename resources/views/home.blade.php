@extends('master.layout')

@section('title','Home')

@section('content')
    <div class="p-5">
        <h2>Manage Transactions</h2>
        <a href="{{route('create-transaction-page')}}" class="btn btn-info">Insert Transaction</a>
        <form action="">
            <div class="input-group my-3">
                <input type="text" class="form-control" name="search" placeholder="Search based on cashier" aria-label="Search" aria-describedby="button-addon2" value="">
                <button class="btn btn-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <div class="row">
            <div class="col col-12">
                <table class="table table-dark table-striped">
                    <thead>
                    <th>Invoice Number</th>
                    <th>Cashier</th>
                    <th>Payment Type</th>
                    <th width="20%"></th>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td class="align-middle">{{ $transaction->invoice_number }}</td>
                            <td class="align-middle">{{ $transaction->cashier->name }}</td>
                            <td class="align-middle">{{ $transaction->paymentType->name }}</td>
                            <td class="align-middle">
                                <a href="{{route('detail-transaction',['id'=>$transaction->id])}}" class="btn btn-outline-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
