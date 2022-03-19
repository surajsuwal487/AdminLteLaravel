@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Product List</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">

                {{-- Search Button --}}
                {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="myInput"> --}}
                <form type="GET" action="{{ url('/search') }}">
                  <input type="search" name="query" id="" placeholder="search Product">
                  <button type="submit">Search</button>
                </form>
                {{-- <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div> --}}
              </div>
            </div>
          </div>

          <a class="btn btn-primary" href="{{ url('add-product') }}" role="button">Create New </a>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" id="product-table">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Product Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              @foreach ( $products as $product)
              <tbody>
                <tr >
                  {{-- {{ dd($product) }} --}}
                  <td>{{ $product->name }}</td>
                  <td >{{ $product->catWithProduct->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                      <a href="{{ url('edit-product/'.$product->id) }}"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url('delete-product/'.$product->id) }}"><i class="fas fa-trash"></i></a>

                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <!-- /.card -->
      </div>
    </div>
</div>
<!-- /.content-wrapper -->

@endsection