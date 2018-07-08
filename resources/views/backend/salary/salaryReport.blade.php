<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Salary Statement</title>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        width: auto;
        font-size: 12px;
        border: 1px solid #000000;
        /*border: none;*/
        /*text-align: center;*/
        /*padding-top: 4px;
        padding-bottom:  5px;
        margin-top: 2px;
        margin-bottom: 2px;*/
    }
    input {
        border: none;
    }
    textarea {
        border: none;
  }
  </style>
</head>
<body>
  
  <h4 style="text-align: center;">Salary Statement- {{ $month }} {{ $year }} (Drawsting)</h4>
  <table style="float: center;">
    <thead">
      <tr>
        <th>Employee Name</th>
        <th>Designation</th>
        {{-- <th>Date</th> --}}
        {{-- <th>Month</th>
        <th>Year</th> --}}
        <th>Basic</th>
        <th>Tifin</th>
        <th>OT</th>
        <th>OT Tk</th>
        <th>ABS Day</th>
        <th>ABS Tk</th>
        <th>Advanced</th>
        <th>Total</th>
        <th>Signature</th>
      </tr>
    </thead>
    <tbody>
    @if(sizeof($salarys)>0)
    @foreach($salarys as $salary)
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
        {{-- <td>{{ $salary->year }}</td> --}}
        <td>{{ $salary->basic }}</td>
        <td>{{ $salary->tifin }}</td>
        <td>{{ $salary->over_time }}</td>
        <td>{{ $salary->ot_taka }}</td>
        <td>{{ $salary->abs_day }}</td>
        <td>{{ $salary->abs_taka }}</td>
        <td>{{ $salary->advanced }}</td>
        <td>{{ $salary->total }}</td>
        <td></td>
      </tr>
    @endforeach
    @else
    <tr>
        <td style="text-align: center;" colspan="11">No Data Found</td>
    </tr>
    @endif
    </tbody>
  </table>
</body>
</html>