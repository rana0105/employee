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
                            <li class="active">Leaves</li>
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
                                  @can('add_leave')
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-plus"></i>Add</a>
                                  @endcan
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Employee Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Reason</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($leaves as $leave)
                                  <tr>
                                    <td>{{ $leave->employeeInfo->name }}</td>
                                    <td>{{ $leave->employeeInfo->phone }}</td>
                                    <td>{{ $leave->from_date }} To {{ $leave->to_date }}</td>
                                    <td>{{ $leave->reason }}</td>
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
                                <form action="{{ route('leave.store') }}" method="POST">
                                  {{csrf_field()}}
                                  <div class="form-group row">
                                    <label for="employee_id" class="col-sm-3 col-form-label">Employee Name</label>
                                    <div class="col-sm-8">
                                      <select name="employee_id" id="employee_id" class="livesearch form-control" required="">
                                          <option value="0" disabled="true" selected="ture"></option>
                                          @foreach($employees as $employee)
                                              <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                          @endforeach
                                      </select>
                                      @if ($errors->has('employee_id'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('employee_id') }}</strong>
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
                                  <input type="hidden" name="staffSta" value="1">
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
                                    <label for="reason" class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-8">
                                      <textarea name="reason" id="reason" class="form-control" placeholder="Reason" required="" cols="30" rows="3"></textarea>
                                      @if ($errors->has('reason'))
                                          <span class="help-block text-danger">
                                              <strong>{{ $errors->first('reason') }}</strong>
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
        $('#membersTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    title: 'MN TEX 324 Maynarbag, Hossain Market, Uttar Badda, Dhaka-1212, Bangladesh',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                },
                {
                    extend: 'pdf',
                    pageSize: 'LEGAL',  
                    title: 'MN TEX 324 Maynarbag, Hossain Market, Uttar Badda, Dhaka-1212, Bangladesh',
                    exportOptions: {
                        columns: [0,1,2,3]
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
                        columns: [0,1,2,3]
                    }
                }
            ]
            // "order": [[ 10, "desc" ]]
        });
    });
</script>
@endsection