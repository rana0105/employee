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
                        @can('view_product')
                        <li><a href="{{route('stores.index')}}">Product</a></li>
                        @endcan
                        <li class="active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Create</strong>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('stores.store') }}" method="POST">
                            {{csrf_field()}}
                            {{-- <div class="form-group row">
                              <label for="product_category_id" class="col-sm-2 col-form-label">Category</label>
                              <div class="col-sm-8">
                                <select name="product_category_id" class="livesearch form-control" required="">
                                    <option value="0" disabled="true" selected="ture"></option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_category_id'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('product_category_id') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div> --}}
                            <div class="form-group row">
                              <label for="name" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" id="name" placeholder="name" required="">
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
                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity" required="">
                                @if ($errors->has('quantity'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection