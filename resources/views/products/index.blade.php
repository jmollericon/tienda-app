@extends('layouts.main')
@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            List of producos
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">New product</a>
          </div>
          <div class="card-body">
            @if(session('info'))
              <div class="alert alert-success">{{ session('info') }}</div>
            @endif
            <table class="table table-hover table-sm">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $p)
                  <tr>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->price }}</td>
                    <td>
                      <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <a href="javascript: document.getElementById('delete-{{ $p->id }}').submit()" class="btn btn-danger btn-sm">Delete</a>
                      <form id="delete-{{ $p->id }}" action="{{ route('products.destroy', $p->id) }}" method="POST">
                        @method('delete')
                        @csrf
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            Bienvenido {{ auth()->user()->name }}
            <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Logout</a>
            <form action="{{ route('logout') }}" id="logout" style="display:none" method="POST">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection