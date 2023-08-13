@extends('master.layout')

@section('title','Home')

@section('content')
    <script defer>
        function addMore() {
            var foods = document.querySelector('#foods')
            foods.innerHTML += `
            <div class="row">
                <div class="col col-8">
                    <div class="mb-3">
                        <select class="form-select" name="foods[]" aria-label="Default select example">
                            <option value="" selected class="text-black">Choose Food</option>
                                    @foreach ($foods as $food)
                                        <option value="{{ $food->id }}" class="text-black">{{ $food->name }}</option>
                                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" name="quantities[]" id="quantity" placeholder="Quantity">
                    </div>
                </div>
            </div>`
        }
    </script>
    <div class="p-5">
        <div>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col col-md-4 col-12 mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="invoice_number" placeholder="Invoice Number">
                        </div>
                        <div class="bg-danger px-2 mt-1 rounded">
                            @if ($errors->get('invoice_number'))
                                @foreach ($errors->get('invoice_number') as $message)
                                    <small class="text-white">{{ $message}}</small>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col col-md-4 col-12 mb-3">
                        <div class="input-group">
                            <select name="cashier" class="form-select">
                                <option value="" class="text-black">Choose Cashier</option>
                                @foreach ($cashiers as $cashier)
                                    <option value="{{ $cashier->id }}" class="text-black">{{ $cashier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bg-danger px-2 mt-1 rounded">
                            @if ($errors->get('cashier'))
                                @foreach ($errors->get('cashier') as $message)
                                    <small class="text-white">{{ $message}}</small>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col col-md-4 col-12 mb-3">
                        <div class="input-group">
                            <select name="payment_type" class="form-select">
                                <option value="" class="text-black">Choose Payment Type</option>
                                @foreach ($paymentTypes as $paymentType)
                                    <option value="{{ $paymentType->id }}" class="text-black">{{ $paymentType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="bg-danger px-2 mt-1 rounded">
                            @if ($errors->get('payment_type'))
                                @foreach ($errors->get('payment_type') as $message)
                                    <small class="text-white">{{ $message}}</small>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3" id="foods">
                    <div class="row">
                        <div class="col col-8">
                            <div class="mb-3">
                                <select class="form-select" name="foods[]" aria-label="Default select example">
                                    <option value="" selected class="text-black">Choose Food</option>
                                    @foreach ($foods as $food)
                                        <option value="{{ $food->id }}" class="text-black">{{ $food->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col col-4">
                            <div class="mb-3">
                                <input type="number" class="form-control" name="quantities[]" id="quantity" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="bg-danger px-2 mt-1 rounded">
                        @if ($errors->get('foods.*'))
                            <small class="text-white">Each food must be chosen</small>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <div class="bg-danger px-2 mt-1 rounded">
                        @if ($errors->get('quantities.*'))
                            <small class="text-white">Each food must be chosen</small>
                        @endif
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button class="btn btn-light" onclick="addMore()" type="button">Add More</button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-info">Insert Transaction</button>
                </div>
            </form>
        </div>
    </div>
@endsection
