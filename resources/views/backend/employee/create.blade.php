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
                        @can('view_employee')
                        <li><a href="{{ url()->previous() }}">Employees</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Create</strong>
                        </div>
                        <div class="card-body">
                          <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" file="true">
                            {{csrf_field()}}
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
                                <label for="designation" class="col-sm-2 col-form-label">Designation</label>
                                <div class="col-sm-8">
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="designation" required="">
                                    @if ($errors->has('designation'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department" class="col-sm-2 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <input type="text" name="department" class="form-control" id="department" placeholder="department" required="">
                                    @if ($errors->has('department'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('department') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="basic_salary" class="col-sm-2 col-form-label">Basic Salary</label>
                                <div class="col-sm-8">
                                    <input type="number" name="basic_salary" class="form-control" id="basic_salary" placeholder="basic_salary" required="">
                                    @if ($errors->has('basic_salary'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('basic_salary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="phone" required="">
                                    @if ($errors->has('phone'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input email="text" name="email" class="form-control" id="email" placeholder="email" required="">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nid" class="col-sm-2 col-form-label">NID</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nid" class="form-control" id="nid" placeholder="nid" required="">
                                    @if ($errors->has('nid'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('nid') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="present_address" class="col-sm-2 col-form-label">Present Address</label>
                              <div class="col-sm-8">
                                <textarea name="present_address" id="present_address" cols="30" class="form-control" rows="5" placeholder="present_address"></textarea>
                                @if ($errors->has('present_address'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('present_address') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="permanent_address" class="col-sm-2 col-form-label">Permanent Address</label>
                                <div class="col-sm-8">
                                    <textarea name="permanent_address" id="permanent_address" cols="30" class="form-control" rows="5" placeholder="permanent_address"></textarea>
                                    @if ($errors->has('permanent_address'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('permanent_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Staff Status:</label>
                                <div class="col-sm-8">
                                    <select name="staff"  class="form-control">
                                        @foreach(config('statusStaff.reverse_status') as $key => $staff)
                                            <option value="{{ $key }}">{{ $staff }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="image" class="col-sm-2 col-form-label">Image</label>
                              <div class="col-sm-8">
                                <input type="file" name="image" class="form-control" id="image" required="">
                                @if ($errors->has('image'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
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
@section('script')
<script type="text/javascript">
</script>
@endsection