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
                        <li><a href="{{route('supply.index')}}">Supply</a></li>
                        <li class="active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Update</strong>
                        </div>
                        <div class="card-body">
                        {!! Form::open(['route' => ['supply.update', $supply->id ], 'method' => 'PUT'])!!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="product_id" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-8">
                                <select name="product_id" id="product_id" class="livesearch form-control" required="">
                                    @if(sizeof($sizeQtnpro)>0)
                                        @foreach($products as $key => $product)
                                            <option value="{{ $product->id }}" {{ $product->id == $sizeQtnpro->product_id ? 'selected':'' }}>{{ $product->name }}</option>
                                        @endforeach
                                    @endif
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
                                <input type="text" name="buyer_name" class="form-control" id="buyer_name" value="{{$supply->buyer_name}}" required="">
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
                                <input type="text" name="reference_no" class="form-control" id="reference_no" value="{{$supply->reference_no}}" required="">
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
                                <input type="text" name="order_no" class="form-control" id="order_no" value="{{$supply->order_no}}" required="">
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
                                <input type="text" name="color" class="form-control" id="color" value="{{$supply->color}}" required="">
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
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="from_date" class="col-sm-3 col-form-label">From Date</label>
                                <div class="col-sm-8">
                                <input type="date" name="from_date" class="form-control" id="from_date" value="{{$supply->from_date}}" required="">
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
                                <input type="date" name="to_date" class="form-control" id="to_date" value="{{$supply->to_date}}" required="">
                                @if ($errors->has('to_date'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('to_date') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $myArr = [];
    if(sizeof($sizeQtn)>0){
        foreach($sizeQtn as $arr){
            $myArr[] = ['supply_id' => $arr->supply_id, 'size_id'=> $arr->size_id, 'size_quantity' => $arr->size_quantity, 'sizeName' => $arr->sizeName->name] ;   
        }
    }
    $myjson = json_encode($myArr);

    ?>
    <input type="hidden" id="json" value="{{$myjson}}">
@endsection
@section('script')
<script>
        $(document).ready(function() {
           var jsonVal = JSON.parse($('#json').val());
           var pro = JSON.parse($('#pro').val());
           //console.log(jsonVal[0]);
           $('.addRow').on('click', function(){
            var pro = $('#pro').val();
                addRow(pro);
            });
           for (x in jsonVal){
            var tr='<tr>'+
                    '<td>'+
                    '<select class="livesearch form-control product-name"  name="size[]" >';
                      $.each( pro, function( key, value ) {
                        // tr +='<option value="'+ jsonVal[x].size_id +'">'+ jsonVal[x].sizeName +'</option>';
                        tr +='<option value="'+  value['id'] +'" ' + (value['id'] === jsonVal[x].size_id ? 'selected' : '') + '>'+ value['name'] +'</option>';
                      });   	
               tr +=  '</select>'+ 
                 '</td>'+
                    '<td><input type="text" value="'+ jsonVal[x].size_quantity +'" name="order_quantity[]" class="form-control qtn" onblur="qtn_check()"></td>'+
                    '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
                    '</tr>';

                $('#main-tbl tbody').append(tr);
           }

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