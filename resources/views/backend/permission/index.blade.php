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
                            <li class="active">Permission</li>
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
                                    @can('add_permission')
                                	<a class="btn btn-primary" href="{{ URL::route('permissions.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Create</a>
                                    @endcan
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>#</th>
									<th>Name</th>
									<th>Guard Name</th>
                                    <th>Display Name</th>
									<th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                              	@foreach($permissions as $permission)
									<tr>
										<th>{{ $permission->id  }}</th>
										<td>{{ $permission->name }}</td>
										<td>{{ $permission->guard_name }}</td>
										<td>{{ $permission->display_name }}</td>
										<td>
										@can('edit_permission')
										<a href="{{ URL::route('permissions.edit', $permission->id) }}" class="btn btn-info btn-responsive"><i class="fa fa-edit" aria-hidden="true"></i></a>
										@endcan
										@can('delete_permission')
										{!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
										
										{{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
										{!! Form::close() !!}
										@endcan
										</td>
									</tr>
								@endforeach 
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