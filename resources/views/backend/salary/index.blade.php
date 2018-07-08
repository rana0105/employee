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
                            <li class="active">Salary</li>
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            @can('add_salary')
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-plus"></i>Add</a>
                                            @endcan
                                        </div>
                                        <div class="col-md-8">
                                            <form action="{{ route('report.show') }}" method="POST" target="blank">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        @php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']  @endphp
                                                        <select class="form-control" name="month" title=" " required="">
                                                            @foreach($months as $key => $month)
                                                            <option value="{{ $month }}"
                                                            @if($month == date('F'))
                                                                selected=""
                                                            @endif
                                                            >{{ $month }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="year" title=" " required="" style="margin-bottom: 2%;">
                                                            @for($i = 2015; $i <= 2030; $i++)
                                                                <option value="{{$i}}"
                                                                @if($i == date('Y'))
                                                                selected=""
                                                                @endif
                                                                >{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-warning">Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-body table-responsive">
                              <table id="membersTable" class="table  table-bordered " cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    {{-- <th>Date</th> --}}
{{--                                     <th>Month</th>
                                    <th>Year</th> --}}
                                    <th>Basic</th>
                                    <th>Tifin</th>
                                    <th>OT</th>
                                    <th>OT Tk</th>
                                    <th>ABS Day</th>
                                    <th>ABS Tk</th>
                                    <th>Advanced</th>
                                    <th>Total</th>
                                    <th style="display: none;">Signature</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($salaries as $salary)
                                  <tr>
                                    <td>{{ $salary->employeeSalary->name }}</td>
                                    <td>{{ $salary->employeeSalary->designation }}</td>
                                    {{-- <td>{{ $salary->date }}</td> --}}
                                    {{-- <td>
                                        @php $monthss = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']  @endphp
                                        @foreach($monthss as $key => $month)
                                        @if($key == $salary->month)
                                            {{ $month }}
                                        @endif
                                        @endforeach
                                    </td> --}}
                                    {{-- <td>{{ $salary->month }}</td>
                                    <td>{{ $salary->year }}</td> --}}
                                    <td>{{ $salary->basic }}</td>
                                    <td>{{ $salary->tifin }}</td>
                                    <td>{{ $salary->over_time }}</td>
                                    <td>{{ $salary->ot_taka }}</td>
                                    <td>{{ $salary->abs_day }}</td>
                                    <td>{{ $salary->abs_taka }}</td>
                                    <td>{{ $salary->advanced }}</td>
                                    <td>{{ $salary->total }}</td>
                                    <td></td>
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
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <form action="{{ route('salary.store') }}" method="POST">
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
                                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="date" class="form-control" id="date" placeholder="date" required="" value="">
                                        @if ($errors->has('date'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                    <label for="month" class="col-sm-3 col-form-label">Month</label>
                                    @php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']  @endphp
                                    <div class="col-sm-8">
                                        <select class="form-control" name="month" title=" " required="">
                                            @foreach($months as $key => $month)
                                            <option value="{{ $key }}"
                                            @if($month == date('F'))
                                                selected=""
                                            @endif
                                            >{{ $month }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('month'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('month') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div> --}}
                                    {{-- <div class="form-group row">
                                    <label for="year" class="col-sm-3 col-form-label">Year</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="year" title=" " required="" style="margin-bottom: 2%;">
                                            @for($i = 2015; $i <= 2030; $i++)
                                                <option value="{{$i}}"
                                                @if($i == date('Y'))
                                                selected=""
                                                @endif
                                                >{{$i}}</option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('year'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('year') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div> --}}
                                    <div class="form-group row">
                                    <label for="basic" class="col-sm-3 col-form-label">Basic Salary</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="basic" class="form-control" id="basic" readonly="" required="" value="">
                                        @if ($errors->has('basic'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('basic') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="tifin" class="col-sm-3 col-form-label">Tifin</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="tifin" class="form-control" id="tifin" placeholder="" required="" value="">
                                        @if ($errors->has('tifin'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('tifin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="over_time" class="col-sm-3 col-form-label">Over Time</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="over_time" class="form-control" id="over_time" placeholder="" required="" value="">
                                        @if ($errors->has('over_time'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('over_time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="ot_taka" class="col-sm-3 col-form-label">OT Taka</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="ot_taka" class="form-control" id="ot_taka" readonly="" required="" value="">
                                        @if ($errors->has('ot_taka'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('ot_taka') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="abs_day" class="col-sm-3 col-form-label">ABS Day</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="abs_day" class="form-control" id="abs_day" placeholder="" required="" value="">
                                        @if ($errors->has('abs_day'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('abs_day') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="abs_taka" class="col-sm-3 col-form-label">ABS Taka</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="abs_taka" class="form-control" id="abs_taka" readonly="" required="" value="">
                                        @if ($errors->has('abs_taka'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('abs_taka') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="advanced" class="col-sm-3 col-form-label">Advanced</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="advanced" class="form-control" id="advanced" placeholder="" required="" value="">
                                        @if ($errors->has('advanced'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('advanced') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="total" class="col-sm-3 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="total" class="form-control" id="total" readonly="" required="">
                                        @if ($errors->has('total'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('total') }}</strong>
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
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="img-style">
                                    <img src="" alt="" id="pro-img" width="170" height="180">
                                </div>
                                <div class="employee-name">
                                    <h5 id="name"></h5> 
                                </div>
                                <div class="employee-name">
                                    <h6 id="department"></h6>
                                </div>
                                <div class="employee-name">
                                    <h6 id="designation"></h6>
                                </div>
                            </div>
                        </div>
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
.chosen-container{
  width: 100% !important;
}
</style>
@endsection
@section('script')
<script>
    var thisLocation = window.location;


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
        
        $('#employee_id').change(function(){
            var id = $(this).val();
            if(id){
                $.ajax({
                    url :'{{URL::to('/employeeId')}}',
                    type: "get",
                    data: {
                       'id':id,
                    },
                    success: function(data){
                       $('#name').html(data.name);
                       $('#pro-img').attr('src', 'uploads/'+data.image);
                       $('#department').html(data.department);
                       $('#designation').html(data.designation);
                       $('#basic').val(data.basic_salary);
                    }
                });
            }
        });

        var total = 0;
        var ottktotal = 0;
        var abstotal = 0;
        var advancedtk = 0;
        var minusVal = 0;
        var addVal = 0;
        var inTotal = 0;

        $('#tifin').keyup(function(){
            var tifin = $(this).val();
            var basic = $('#basic').val();
            total = parseInt(basic) + parseInt(tifin);
            
        });

        $('#over_time').keyup(function(){
            var hour = $(this).val();
            var basic1 = $('#basic').val();
            var divday = parseInt(basic1) / 30;
            var divmonth = divday / 12;
            var muladd = divmonth * 1.5;
            var ottotal = muladd * parseInt(hour);
             ottktotal = total + ottotal;
            //alert(ottktotal)
            if(!isNaN(ottotal)){
                $('#ot_taka').val(ottotal);
            }else{
                $('#ot_taka').val(0);
            }
        });

        $('#abs_day').keyup(function(){
            var absday = $(this).val();
            var basic2 = $('#basic').val();
            var absdiv = parseInt(basic2) / 30;
            abstotal =  absdiv * parseInt(absday);
            if(!isNaN(abstotal)){
                $('#abs_taka').val(abstotal);
            }else{
                $('#abs_taka').val(0);
            }
        });
        $('#advanced').keyup(function(){
             advancedtk = $(this).val();
             minusVal = abstotal + parseInt(advancedtk);
             inTotal = ottktotal - minusVal;
             if(!isNaN(inTotal)){
                $('#total').val(inTotal);
            }else{
                $('#total').val(0);
            }
        });

        // $('[action="{{ route('salary.store') }}"]').submit(function(e){
        //     open("{{ route('salary.index') }}");
        //    // thisLocation.reload(true);
        // });
        
    });
</script>
@endsection