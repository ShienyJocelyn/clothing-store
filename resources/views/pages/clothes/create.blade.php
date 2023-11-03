@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container">
    <h1>Add Product</h1>
    <form action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputUser" class="form-label">Designer</label>
            <select id="inputUser" class="form-select" name="user_id">
                <option value="" selected>Select user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
            @if($errors->first('user_id'))
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputCategory" class="form-label">Categoy</label>
            <select id="inputCategory" class="form-select" name="category">
                <option value="" selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
            @if($errors->first('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="InputProduct" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="inputProduct" name="product_name" value="{{old('product_name')}}">
            @if($errors->first('product_name'))
                <span class="text-danger">{{ $errors->first('product_name') }}</span>
            @endif
        </div>

        
        <div class="mb-3">
            <label for="InputPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="price" value="{{old('price')}}">
            @if($errors->first('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea class="form-control" id="inputDescription" rows="3" name="description">{!!old('description')!!}</textarea>
            @if($errors->first('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
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
            <textarea class="form-control" id="inputContact" rows="3" name="seller_contact">{!!old('seller_contact')!!}</textarea>
            @if($errors->first('seller_contact'))
                <span class="text-danger">{{ $errors->first('seller_contact') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="InputDate" class="form-label">Launching At</label>
            <input type="date" class="form-control" id="inputDate" name="published_at" value="{{old('published_at')}}">
            @if($errors->first('published_at'))
                <span class="text-danger">{{ $errors->first('published_at') }}</span>
            @endif
        </div>


        <a href="{{ route('clothes.index')}}">
            <button type="button" class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection