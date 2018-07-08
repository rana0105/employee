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
                        @can('view_permission')
                        <li><a href="{{route('permissions.index')}}">Permission</a></li>
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
        	        <div class="panel-heading">
            			<div class="panel-title text-left">
            				<h3 class="title">Permssion Created</h>
            				<h5>Note*:- Please Create Permission name Following Method->  view_name, add_name, edit_name, delete_name .</h5>
            				<hr/>
            			</div>
            		</div>
        	    	<form action="{{ route('permissions.store') }}" method="POST">
            			{{ csrf_field() }}
            			<div class="row main">
            			    <div class="col-md-10 col-md-offset-1">
                				<div class="col-xs-6 col-sm-6 col-md-6">
                					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                						
                						<label for="name" class="cols-sm-2 control-label">Name</label>
                						<div class="cols-sm-10">
                							<input type="text" name="name" id="name" class="form-control" placeholder="Input permission name..">
                							<small class="text-danger">{{ $errors->first('name') }}</small>
                						</div>
                					</div>
                				</div>
                				<div class="col-xs-6 col-sm-6 col-md-6">
                					<div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
                						
                						<label for="guard_name" class="cols-sm-2 control-label">Guard</label>
                						<div class="cols-sm-10">
                							<select name="guard_name" id="guard_name" readonly="" class="form-control">
                								<option value="web">web</option>
                							</select>
                							<small class="text-danger">{{ $errors->first('guard_name') }}</small>
                						</div>
                					</div>
                				</div>
                				<div class="col-xs-6 col-sm-6 col-md-6">
                					<div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
                						
                						<label for="display_name" class="cols-sm-2 control-label">Display Name</label>
                						<div class="cols-sm-10">
                							<input type="text" name="display_name" id="display_name" class="form-control" placeholder="Input permission display name..">
                							<small class="text-danger">{{ $errors->first('display_name') }}</small>
                						</div>
                					</div>
                				</div>
            				</div>
            			</div>
            			<div class="form-group">
            				<input type="submit" value="Submit" class="btn btn-success">
            			</div>
    		        </form>
                </div>
            </div>
        </div>
    </div>
@endsection