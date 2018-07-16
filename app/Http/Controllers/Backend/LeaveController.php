<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use App\Model\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function officeLeaves()
    {
        $leaves = Leave::where('staffSta', 0)->get();
        $employees = Employee::where('staff', 0)->get();
        return view('backend.leave.officeLeaves', compact('leaves', 'employees'));
    }

    public function floorLeaves()
    {
        $leaves = Leave::where('staffSta', 1)->get();
        $employees = Employee::where('staff', 1)->get();
        return view('backend.leave.floorLeaves', compact('leaves', 'employees'));
    }

    public function workerLeaves()
    {
        $leaves = Leave::where('staffSta', 2)->get();
        $employees = Employee::where('staff', 2)->get();
        return view('backend.leave.workerLeaves', compact('leaves', 'employees'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'employee_id' => 'required',
            'staffSta' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required'
        ]);

        Leave::create($request->all());
        if ($request->staffSta == 0) {
            return redirect()->route('officeLeaves')->with('success', 'Office staff leave created have been successfully!');
        }elseif ($request->staffSta == 1) {
            return redirect()->route('floorLeaves')->with('success', 'Floor staff leave created have been successfully!');
        }else{
            return redirect()->route('workerLeaves')->with('success', 'Worker staff leave created have been successfully!');
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
        //
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
