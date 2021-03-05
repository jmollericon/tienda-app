@extends('layouts.main')
@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Edit product
          </div>
          <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
              @method('put')
              @csrf
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}" placeholder="Enter the description">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" placeholder="Enter the price">
              </div>
              <button class="btn btn-primary btn-sm">Save</button>
              <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection