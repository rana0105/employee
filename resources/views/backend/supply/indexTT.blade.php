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
                      <div class="card-body">
                        <table id="membersTable" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th style="display: none;">#</th>
                              <th>Buyer Name</th>
                              <th>Reference Name</th>
                              <th>Product Name</th>
                              <th>Order No / FO No</th>
                              <th>Order Quantity</th>
                              <th>Color</th>
                              <th>Size</th>
                              <th>Available Quantity</th>
                              <th>Delivery Stock</th>
                              <th>Lead Time</th>
                              <th>Delivery Date</th>
                              <th>Delivery No</th>
                              <th>Add Delivery</th>
                              <th>Remark</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($supplies as $supply)
                            <tr supp-id="{{ $supply->id }}">
                              <td style="display: none;">{{ $supply->id }}</td>
                              <td>{{ $supply->buyer_name }}</td>
                              <td>{{ $supply->reference_no }}</td>
                              <td>{{ $supply->products->name }}</td>
                              <td>{{ $supply->order_no }}</td>
                              <td>
                                @if($supply->quantity->count() > 0)
                                    @foreach($supply->quantity as $sizq)
                                        <div class="">{{ $sizq->size_quantity }}</div><br>
                                    @endforeach
                                @endif
                              </td>
                              <td>{{ $supply->color }}</td>
                              <td>
                                  @if($supply->quantity->count() > 0)
                                      @foreach($supply->quantity as $siz)
                                          <div class="">{{ $siz->sizeName->name }} -> {{ $siz->size_quantity }}</div><br>
                                      @endforeach
                                  @endif
                              </td>
                              <td>
                                  @if($supply->quantity->count() > 0)
                                      @foreach($supply->quantity as $lqtn)
                                          <p><span class="badge badge-success">{{ $lqtn->last_quantity }} Available</span></p><br>
                                      @endforeach
                                  @endif
                              </td>
                              <td></td>
                              <td>
                                @php
                                $fdate = $supply->from_date;
                                $tdate = $supply->to_date;
                                $datetime1 = new DateTime($fdate);
                                $datetime2 = new DateTime($tdate);
                                $interval = $datetime1->diff($datetime2);
                                $days = $interval->format('%a');//now do whatever you like with $days
                                @endphp
                                {{ $supply->from_date }} To {{ $supply->to_date }}
                                <p><span class="badge badge-success">{{ $days }} Days</span></p>
                              </td>
                               <td>
                                @if($supply->supplydate->count() > 0)
                                    @foreach($supply->supplydate as $supplyInfo)
                                      <div class="">{{$supplyInfo->supply_date .' -> '. $supplyInfo->supply_quantity}} / {{$supplyInfo->namesize ? $supplyInfo->namesize->name : ''}}</div><br>
                                    @endforeach
                                @endif
                              </td>
                              <td>
                                @if($supply->supplydate->count() > 0)
                                    @foreach($supply->supplydate as $supplyNo)
                                      <div class="">{{ $supplyNo->delivery_no }} / {{ $supplyNo->namesize ? $supplyNo->namesize->name : '' }}</div><br>
                                    @endforeach
                                @endif
                              </td>
                              <td>
                                <div class="btn-group">
                                      <a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#" >
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
                                                          <select name="size_id" id="size_id" class="livesearch form-control" required="">
                                                              <option value="0" disabled="true" selected="ture"></option>
                                                                  @foreach($sizes as $size)
                                                                      <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                                  @endforeach
                                                          </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <input type="number" name="supply_quantity" placeholder="Quantity" required="" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                      <input type="text" name="delivery_no" placeholder="Delivery No" required="" class="form-control">
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
                              <td class="remark center-block text-center">
                                  @if('' == $supply->remark)
                                    <i class="fa fa-2x fa-pencil"></i>
                                  @endif 
                                  {{ str_limit($supply->remark, 10) }}
                              </td>
                              <td>
                                @can('edit_supply')
                                <a href="{{ route('supply.edit', $supply->id) }}">
                                    <button class="btn btn-style btn-small btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                </a>
                                @endcan
                                @can('delete_supply')
                                {!! Form::open(['route' => ['supply.destroy', $supply->id ], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
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
                        <label for="reference_no" class="col-sm-3 col-form-label">Reference Name</label>
                        <div class="col-sm-8">
                        <input type="text" name="reference_no" class="form-control" id="reference_no" placeholder="reference_name" required="">
                        @if ($errors->has('reference_no'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('reference_no') }}</strong>
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
                        <label for="size" class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-8">
                        <table id="main-tbl"class="table table-responsive table-bordered">
                            <thead>
                                <th>Size</th>
                                <th>Quantity</th>
                                <input type="hidden" id="pro" value="{{$sizes}}">
                            <th style="text-align: center;"><a  class="btn btn-success btn-sm addRow"  href="javascript:void(0)" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></a></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 250px;">
                                        <select name="size[]" id="size" class="livesearch form-control" required="">
                                            <option value="0" disabled="true" selected="ture"></option>
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('size'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('size') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                    <td><input type="text" name="order_quantity[]" class="form-control qtn"></td>
                                    <td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
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
    
    .content {
        width: 80vw;
    }
    
    .chosen-container{
      width: 100% !important;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.remark').dblclick(function(){
            if($('#remark_add').length > 0){
                $('#remark_add').parent().html($('#remark_add').val());
                $('#remark_add').remove();
            }
           $(this).html('<input value="'+$(this).text().trim()+'" type="text" class="form-control" name="remark" id="remark_add" size="">');
        });


        $(document).on('keyup', '#remark_add', function(e){
            var thisInp = $(this);
            var suppId = thisInp.closest('tr').attr('supp-id');
            if(e.which == 13){
                var remarkVal = thisInp.val();
                var url = '{{ route('sremarkSupply', [':supplyID', ':supplyVal']) }}/'+suppId+'/'+remarkVal;
                url = url.replace(':supplyID/:supplyVal/', '');
                $.ajax({
                    url: url,
                    success: function(){
                        console.log('success');
                        thisInp.closest('td').html(remarkVal);
                    },
                    error: function(){
                        console.log('Error');
                    }
                });
            }
        });

        var printCounter = 0;
     
        $('#membersTable').DataTable( {
            
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    title: 'MN TEX 324 Maynarbag, Hossain Market, Uttar Badda, Dhaka-1212, Bangladesh',
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,14]
                    }
                },
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',  
                    title: 'MN TEX 324 Maynarbag, Hossain Market, Uttar Badda, Dhaka-1212, Bangladesh',
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,14]
                    }
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
                    title: 'MN TEX 324 Maynarbag, Hossain Market, Uttar Badda, Dhaka-1212, Bangladesh',
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,14]
                    }
                }
            ],
            "order": [[ 0, "ase" ]],
            "scrollX": true
        } );

        $('.addRow').on('click', function(){
            var pro = $('#pro').val();
            addRow(pro);
            
        });

        $('body').on('click', '.remove', function(){
            var len = $('tbody tr').length;		
                $(this).parent().parent().remove();	
        });
    } );

    function addRow(pro)
  	{
  		var tr='<tr>'+
  	   				'<td>'+
  	   				'<select class="livesearch form-control product-name"  name="size[]" >'+
                      	'<option value="0" disabled="trform-controlue" selected="ture">Select an Option</option>';
                       	$.each( JSON.parse(pro), function( key, value ) {
  						   tr +='<option value="'+ value['id'] +'">'+value['name'] +'</option>';
  						 });   	
          		  tr +=  '</select>'+ 
              		'</td>'+
  	   				'<td><input type="text" name="order_quantity[]" class="form-control qtn" onblur="qtn_check()"></td>'+
  	   				'<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
  	   				'</tr>';
  			$('#main-tbl tbody').append(tr);
  			$(".livesearch").chosen();
  			
  	};
</script>
@endsection