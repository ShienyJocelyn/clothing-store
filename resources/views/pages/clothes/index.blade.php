@extends('layouts.app')

@section('title', 'Clothes List')

@section('content')
<div class="container">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1>Clothes List</h1>
<a class="btn btn-primary"href="{{ route('clothes.create') }}">Create</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Link</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clothes as $cloth)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td> {{ $cloth->product_name }} </td>
        <td> {{ $cloth->image }} </td>
        <td> {{ $cloth->price }}</td>
        <td>
          <a href="{{ route('clothes.edit', $cloth->id) }}">Edit</a>
          <form action="{{ route('clothes.destroy', $cloth->id) }}" method="POST" id="destroy-{{ $cloth->id }}">
            @csrf
            @method('DELETE')
            <a href="#" onclick="document.getElementById('destroy-{{ $cloth->id }}').submit()">Delete</a>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $clothes->links() !!}
@endsection
