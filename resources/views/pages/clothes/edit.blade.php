@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('clothes.update', $cloth->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputUser" class="form-label">Designer</label>
            @can('is_admin')
            <select id="inputUser" class="form-select" name="user_id">
                <option value="" selected>Select user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if((old('user_id')) ?? $cloth->user_id == $user->id) selected @endif> {{ $user->name }}</option>
                @endforeach
            </select>
            @else
                <input type="text" class="form-control" value="{{$users->where('id', $cloth->user_id)->first()->name}}" disabled>
            @endcan
            @if($errors->first('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputCategory" class="form-label">Category</label>
            <select id="inputCategory" class="form-select" name="category">
                <option value="" selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if((old('category')) ?? $cloth->category == $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
            {{-- @else 
                <input type="text" class="form-control" value="{{ $categories->where('id', $clothes->category)->first()->title }}" disabled> --}}
            @if($errors->first('category'))
                <span class="text-danger">{{ $errors->first('category') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputProduct" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="inputProduct" name="productName" value="{{ old('title') ?? $cloth->product_name }}" disabled> 
            @if($errors->first('productName'))
                <span class="text-danger">{{ $errors->first('productName') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="price" value="{{ old('title') ?? $cloth->price }}" disabled> 
            @if($errors->first('price'))
                <span class="text-danger">{{ $errors->first('price') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea class="form-control" id="inputDescription" rows="3" name="description" disabled>{{ old('description') ?? $cloth->description }}</textarea>
            @if($errors->first('description'))
                <span class="text-danger">{{ $errors->first('description') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputImage" class="form-label">Image</label>
            <input class='form-control' type="file" name="image">
            @if($errors->first('image'))
                <span class="text-danger">{{ $errors->first('image')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="inputContact" class="form-label">Seller Contact</label>
            <textarea class="form-control" id="inputContact" rows="3" name="contact">{{ old('contact') ?? $cloth->contact }}</textarea>
            @if($errors->first('note'))
                <span class="text-danger">{{ $errors->first('contact') }} </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="InputDate" class="form-label">Launching At</label>
            <input type="date" class="form-control" id="inputDate" name="published_at" value="{{old('published_at') ?? $cloth->published_at }}">
            @if($errors->first('published_at'))
                <span class="text-danger">{{ $errors->first('published_at') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection