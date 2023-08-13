@extends('master.layout')

@section('title', 'Edit Food')

@section('content')
    <div class="container p-5">
        <h2>Edit Food</h2>
        <form action="" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            @csrf
            <div class="my-3 justify-content-center d-flex">
                <img class="rounded" src="{{ Storage::url('foods/'.$food->image)}}" alt="" width="40%">
            </div>
            <div class="my-3">
                <small>Food image is optional</small>
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
            <div class="my-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="Food Name" value="{{ $food->name }}">
                </div>
                <div class="bg-danger px-2 mt-1 rounded">
                    @if ($errors->get('name'))
                        @foreach ($errors->get('name') as $message)
                            <small class="text-white">{{ $message}}</small>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="my-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="price" placeholder="Food Price" value="{{ $food->price }}">
                </div>
                <div class="bg-danger px-2 mt-1 rounded">
                    @if ($errors->get('price'))
                        @foreach ($errors->get('price') as $message)
                            <small class="text-white">{{ $message}}</small>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="my-3">
                <div class="input-group">
                    <select name="category" class="form-select">
                        <option class="text-black" value="">Choose Category</option>
                        @foreach ($categories as $category)
                        <option {{$food->category->id == $category->id ? 'selected' : ''}} class="text-black" value="{{$category->id}}">{{$category->name}}</option>
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
                <button class="form-control btn-success">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
