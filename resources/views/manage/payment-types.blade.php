@extends('master.layout')

@section('title','Manage Payment Types')

@section('content')
    <div class="p-5">
        <h2>Manage Payment Types</h2>
        <div class="row">
            <div class="col col-12 col-md-8">
                <table class="table table-dark table-striped">
                    <thead>
                    <th>Name</th>
                    <th width="20%"></th>
                    </thead>
                    <tbody>
                        @foreach ($paymentTypes as $paymentType)
                        <tr>
                            <td class="align-middle">{{ $paymentType->name }}</td>
                            <td class="align-middle">
                                <a href="{{ route('edit-payment-type', ['id'=>$paymentType->id]) }}" class="btn btn-outline-warning">Edit</a>
                                <form method="post" action="{{ route('delete-payment-type', ['id'=>$paymentType->id]) }}" method="" class="d-inline">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col col-12 col-md-4">
                <table class="table table-dark">
                    <thead>
                    <th>Insert New Payment Type</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <form action="" method="post">
                                @csrf
                                <div class="my-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Payment Type Name">
                                    </div>
                                    <div class="bg-danger px-2 mt-1 rounded">
                                        @if ($errors->any())
                                            <small class="text-white">{{$errors->first()}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button class="form-control btn-info">Insert Payment Type</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
