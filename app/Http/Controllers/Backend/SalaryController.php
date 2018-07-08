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
    public function index()
    {
        $salaries = Salary::all();
        $employees = Employee::where('status', 0)->get();
        return view('backend.salary.index', compact('salaries', 'employees'));
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
        //return redirect()->route('salary.show', $salary->id)->with('success', 'Data have been save!');
        return redirect()->route('salary.index')->with('success', 'Employee salary created have been successfully!');
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
        $salarys = Salary::where('month', $request->month)
                ->where('year', $request->year)
                ->get();
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
