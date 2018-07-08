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
                        <li><a href="{{route('product.index')}}">Product</a></li>
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
                        {!! Form::open(['route' => ['product.update', $product->id ], 'method' => 'PUT'])!!}
                            {{csrf_field()}}
                            <div class="form-group row">
                              <label for="product_category_id" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-8">
                                {{ Form::select('product_category_id', $cate, $product->product_category_id , ["class" => 'form-control'])}}
                                @if ($errors->has('product_category_id'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('product_category_id') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="name" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                              <div class="col-sm-8">
                                <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                                @if ($errors->has('quantity'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
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
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection