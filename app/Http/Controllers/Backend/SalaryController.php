<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employee;
use App\Model\Salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function officeSalary()
    {
        $salaries = Salary::where('satffSalary', 0)->get();
        $employees = Employee::where('staff', 0)->get();
        return view('backend.salary.officeSalary', compact('salaries', 'employees'));
    }

    public function floorSalary()
    {
        $salaries = Salary::where('satffSalary', 1)->get();
        $employees = Employee::where('staff', 1)->get();
        return view('backend.salary.floorSalary', compact('salaries', 'employees'));
    }

    public function workerSalary()
    {
        $salaries = Salary::where('satffSalary', 2)->get();
        $employees = Employee::where('staff', 2)->get();
        return view('backend.salary.workerSalary', compact('salaries', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function employeeId(Request $request)
    {
        $employee = Employee::where('id', $request->id)->first();
        // dd($employee);
        return Response()->json($employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'satffSalary' => 'required',
            'date' => 'required',
            'month' => '',
            'year' => '',
            'basic' => 'required',
            'tifin' => 'required',
            'over_time' => 'required',
            'ot_taka' => 'required',
            'abs_day' => 'required',
            'abs_taka' => 'required',
            'advanced' => 'required',
            'total' => 'required'
        ]);
        $date = $request->date;
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));
        $deposit = $request->basic + $request->tifin + $request->ot_taka;
        $cost = $request->abs_taka + $request->advanced;
        $total = $deposit - $cost;

        $salary = Salary::create($request->except(['month', 'year', 'total',]) + [
                'month' => $month,
                'year' => $year,
                'total' => $total,
            ]);
        if ($request->satffSalary == 0) {
            return redirect()->route('officeSalary')->with('success', 'Office Staff salary created have been successfully!');
        }elseif ($request->satffSalary == 1) {
            return redirect()->route('floorSalary')->with('success', 'Floor Staff salary created have been successfully!');
        }else{
            return redirect()->route('workerSalary')->with('success', 'Worker salary created have been successfully!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::find($id);
        $pdf = \PDF::loadView('backend.salary.salaryReport', [
            'salary' => $salary
            ]);
        return $pdf->stream('salary.pdf');
    }
    public function reportShow(Request $request)
    {
        if ($request->staff == 0) {
            $salarys = Salary::where('satffSalary', 0)->where('month', $request->month)
                ->where('year', $request->year)
                ->get();
        }elseif ($request->staff == 1) {
            $salarys = Salary::where('satffSalary', 1)->where('month', $request->month)
                ->where('year', $request->year)
                ->get();
        }else{
            $salarys = Salary::where('satffSalary', 2)->where('month', $request->month)
                ->where('year', $request->year)
                ->get();
        }
        
        $pdf = \PDF::loadView('backend.salary.salaryReport', [
            'salarys' => $salarys,
            'month' => $request->month,
            'year' => $request->year
            ]);
        return $pdf->stream('salary.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
