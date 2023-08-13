@extends('master.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="container p-5">
        <h2>Edit Category</h2>
        <form action="" method="post">
            {{ method_field('put') }}
            @csrf
            <div class="my-3">
                <div class="input-group">
                    <input value="{{ $category->name }}" type="text" class="form-control" name="name" placeholder="Category Name">
                </div>
                <div class="bg-danger px-2 mt-1 rounded">
                    @if ($errors->any())
                        <small class="text-white">{{$errors->first()}}</small>
                    @endif
                </div>
            </div>
            <div class="input-group mb-3">
                <button class="form-control btn-success">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
