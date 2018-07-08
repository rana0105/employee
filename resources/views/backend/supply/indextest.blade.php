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
                            <li class="active">Supply</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('warning'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Deleted!</strong> {{ session('warning') }}.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endif
                        <div class="card">
                                <div class="card-header">
                                  @can('add_supply')
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-plus"></i>Add</a>
                                  @endcan
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Buyer Name</th>
                                    <th>Order No / FO No</th>
                                    <th>Color</th>
                                    <th>Mesurement</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                    <th>Delivery</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($supplies as $supply)
                                  <tr>
                                    <td>{{ $supply->products->name }}</td>
                                    <td>{{ $supply->buyer_name }}</td>
                                    <td>{{ $supply->order_no }}</td>
                                    <td>{{ $supply->color }}</td>
                                    <td>{{ $supply->size }}</td>
                                    <td>{{ $baseQuentity = $supply->order_quantity }}
                                      @if($supply->supplydate->count() > 0)
                                          @foreach($supply->supplydate as $supplyInfo)
                                            @php $baseQuentity = $baseQuentity - $supplyInfo->supply_quantity @endphp
                                          @endforeach
                                          <span class="badge badge-success">{{$baseQuentity}} Available</span>
                                      @endif                                        
                                    </td>
                                    <td>{{ $supply->from_date }} To {{ $supply->to_date }}</td>
                                     <td>
                                      @if($supply->supplydate->count() > 0)
                                          @foreach($supply->supplydate as $supplyInfo)
                                            <div class="">{{$supplyInfo->supply_date .' -> '. $supplyInfo->supply_quantity}}</div>
                                          @endforeach
                                      @endif
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                <span class="caret"><i class="fa fa-plus"></i></i></span>
                                            </a>
                                            <ul class="dropdown-menu style1">
                                                <form action="{{ route('supply-date') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <input type="hidden" name="supply_id" value="{{ $supply->id }}" required="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <input type="date" name="supply_date" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <input type="number" name="supply_quantity" placeholder="Quantity" required="" class="form-control">
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                                <form action="{{ route('supply.store') }}" method="POST">
                                  {{csrf_field()}}
                                  <div class="form-group row">
                                    <label for="product_id" class="col-sm-3 col-form-label">Product</label>
                                    <div class="col-sm-8">
                                      <select name="product_id" id="product_id" class="livesearch form-control" required="">
                                        <option value="0" disabled="true" selected="ture"></option>
                                          @foreach($products as $product)
                                              <option value="{{ $product->id }}">{{ $product->name }}</option>
                                          @endforeach
                                      </select>
                                      @if ($errors->has('product_id'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('product_id') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="buyer_name" class="col-sm-3 col-form-label">Buyer Name</label>
                                    <div class="col-sm-8">
                                      <input type="text" name="buyer_name" class="form-control" id="buyer_name" placeholder="buyer_name" required="">
                                      @if ($errors->has('buyer_name'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('buyer_name') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="order_no" class="col-sm-3 col-form-label">Order No/FO No</label>
                                    <div class="col-sm-8">
                                      <input type="text" name="order_no" class="form-control" id="order_no" placeholder="order_no" required="">
                                      @if ($errors->has('order_no'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('order_no') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="color" class="col-sm-3 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                      <input type="text" name="color" class="form-control" id="color" placeholder="color" required="">
                                      @if ($errors->has('color'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('color') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="size" class="col-sm-3 col-form-label">Measurement</label>
                                    <div class="col-sm-8">
                                      <input type="text" name="size" class="form-control" id="size" placeholder="size" required="">
                                      @if ($errors->has('size'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('size') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="order_quantity" class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                      <input type="number" name="order_quantity" class="form-control" id="order_quantity" placeholder="order_quantity" required="">
                                      @if ($errors->has('order_quantity'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('order_quantity') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="from_date" class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-8">
                                          <input type="date" name="from_date" class="form-control" id="from_date" placeholder="from_date" required="">
                                          @if ($errors->has('from_date'))
                                              <span class="help-block text-danger">
                                                  <strong>{{ $errors->first('from_date') }}</strong>
                                              </span>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                            <label for="to_date" class="col-sm-3 col-form-label">To Date</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="to_date" class="form-control" id="to_date" placeholder="to_date" required="">
                                              @if ($errors->has('to_date'))
                                                  <span class="help-block text-danger">
                                                      <strong>{{ $errors->first('to_date') }}</strong>
                                                  </span>
                                              @endif
                                            </div>
                                          </div>
                                  <div class="form-group row">
                                    <div class="col-sm-10">
                                      <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
        </div>
@endsection
@section('style')
<style>
    ul.dropdown-menu.style1.show {
        padding: 15px;
    }
    .chosen-container{
      width: 100% !important;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var printCounter = 0;
     
        $('#membersTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    title: '',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'pdf',
                    // orientation: 'landscape',
                    // pageSize: 'LEGAL',  
                    title: ''
                    // exportOptions: {
                    //     columns: [0,1,2,3,4,5,6,7]
                    // }
                },
                {
                    extend: 'print',
                    messageTop: function () {
                        printCounter++;
     
                        if ( printCounter === 1 ) {
                            return 'This is the first time you have printed this document.';
                        }
                        else {
                            return 'You have printed this document '+printCounter+' times';
                        }
                    },
                    title: '',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    }
                }
            ]
        } );
    } );
</script>
@endsection