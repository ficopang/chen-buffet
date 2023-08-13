@extends('master.layout')

@section('title','Manage Foods')

@section('content')
    <div class="p-5">
        <h2>Manage Foods</h2>
        <div class="row">
            <div class="col col-12 col-md-8">
                <table class="table table-dark table-striped">
                    <thead>
                    <th width="15%">Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th width="20%"></th>
                    </thead>
                    <tbody>
                        @foreach ($foods as $food)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ Storage::url('foods/'.$food->image)}}" alt="" width="100%">
                            </td>
                            <td class="align-middle">{{$food->name}}</td>
                            <td class="align-middle">Rp{{$food->price}}</td>
                            <td class="align-middle">{{$food->category->name}}</td>
                            <td class="align-middle">
                                <a href="{{ route('edit-food', ['id'=>$food->id]) }}" class="btn btn-outline-warning">Edit</a>
                                <form method="post" action="{{ route('delete-food', ['id'=>$food->id]) }}" method="" class="d-inline">
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
                    <th>Insert New Food</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="my-3">
                                    <div class="input-group">
                                        <input accept="image/*" name="image" type="file" class="form-control" id="food-image">
                                    </div>
                                    <div class="bg-danger px-2 mt-1 rounded">
                                        @if ($errors->get('image'))
                                            @foreach ($errors->get('image') as $message)
                                                <small class="text-white">{{ $message}}</small>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Food Name">
                                    </div>
                                    <div class="bg-danger px-2 mt-1 rounded">
                                        @if ($errors->get('name'))
                                            @foreach ($errors->get('name') as $message)
                                                <small class="text-white">{{ $message}}</small>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="price" placeholder="Food Price">
                                    </div>
                                    <div class="bg-danger px-2 mt-1 rounded">
                                        @if ($errors->get('price'))
                                            @foreach ($errors->get('price') as $message)
                                                <small class="text-white">{{ $message}}</small>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <select name="category" class="form-select">
                                            <option class="text-black" value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                            <option class="text-black" value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="bg-danger px-2 mt-1 rounded">
                                        @if ($errors->get('category'))
                                            @foreach ($errors->get('category') as $message)
                                                <small class="text-white">{{ $message}}</small>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button class="form-control btn-info">Insert Food</button>
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
