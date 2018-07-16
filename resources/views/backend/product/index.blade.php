@extends('backend.layouts.dashboard')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            <li class="active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-10">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('danger'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Deleted!</strong> {{ session('danger') }}.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endif
                        <div class="card">
                                <div class="card-header">
                                    @can('add_product')
                                    <a class="card-title btn btn-primary" href="{{ route('stores.create') }}"><i class="fa fa-plus"></i>Add</a>
                                    @endcan
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    {{-- <th>Category</th> --}}
                                    <th>Quantity</th>
                                    <th>Stock</th>
                                    <th>Delivery</th>
                                    <th>Add Delivery</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($products as $product)
                                  <tr>
                                    <td>{{ $product->name }}</td>
                                    {{-- <td>{{ $product->category ? $product->category->name : '' }}</td> --}}
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                      @if($product->deliveryDate->count() > 0)
                                        @foreach($product->deliveryDate as $deliveryInfo)
                                          <div class="">{{$deliveryInfo->delivery_date .' -> '. $deliveryInfo->delivery_quantity}}</div><br>
                                        @endforeach
                                    @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                      <a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                          <span class="caret"><i class="fa fa-plus"></i></i></span>
                                      </a>
                                      <ul class="dropdown-menu style1">
                                          <form action="{{ route('deliveryDate') }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <input type="hidden" name="product_id" value="{{ $product->id }}" required="" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <input type="date" name="delivery_date" class="form-control" required="">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <input type="number" name="delivery_quantity" placeholder="Quantity" required="" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                                  </div>  
                                              </div>
                                          </form>
                                      </ul>
                                </div>
                                    </td>
                                    <td>{{ $product->remark }}</td>
                                    <td>
                                        @can('edit_product')
                                        <a href="{{ route('stores.edit', $product->id) }}">
                                            <button class="btn btn-style btn-small btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        @endcan
                                        @can('delete_product')
                                        {!! Form::open(['route' => ['stores.destroy', $product->id ], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
                                            <button class="btn btn-style btn-small btn-danger delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                       {!! Form::close() !!}
                                       @endcan
                                    </td>
                                    @endforeach
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#membersTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
            // "order": [[ 10, "desc" ]]
        });
    });
</script>
@endsection