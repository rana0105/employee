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
                            <li class="active">Employees</li>
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
                                    @can('add_employee')
                                    <a class="card-title btn btn-primary" href="{{ route('employees.create') }}"><i class="fa fa-plus"></i>Add Employee</a>
                                    @endcan
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Employee</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Basic Salary</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>NID</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($floorStaffs as $employee)
                                  <tr>
                                    <td class="imaname"><p class="imgnnn"><img src="{{ asset('/uploads/'. $employee->image) }}" alt="{{ $employee->image }}" width="60" height="60" class="img img-circle"> {{ $employee->name }}</p></td>
                                    <td>{{ $employee->designation }}</td>
                                    <td>{{ $employee->department }}</td>
                                    <td>{{ $employee->basic_salary }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->nid }}</td>
                                    <td>{{ $employee->present_address }}</td>
                                    <td>{{ $employee->permanent_address }}</td>
                                    <td>
                                        @if($employee->status == 0)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit_employee')
                                        <a href="{{ route('employees.edit', $employee->id) }}">
                                            <button class="btn btn-style btn-small btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>
                                        @endcan
                                        @can('delete_employee')
                                        {!! Form::open(['route' => ['employees.destroy', $employee->id ], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
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
@section('style')
<style>
    
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
                        columns: [0,1,2,3,4,5,6,7,8,9]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',  
                    title: '',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9]
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
                    title: '',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9]
                    }
                }
            ]
        } );
    } );
</script>
@endsection