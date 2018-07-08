<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employee;
use Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.create');
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
            'name' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'phone' => 'required|unique:employees',
            'email' => '',
            'nid' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'basic_salary' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        //dd($request->all());
        if($image = $request->file('image')) {
            $employeeImg = Storage::disk('uploads')->put('employee',$image);
        }
        Employee::create($request->except('image')+['image' => $employeeImg]);
        return redirect()->route('employees.index')->with('success', 'Employee information created successfully !');
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
        $employee = Employee::find($id);
        return view('backend.employee.edit', compact('employee'));
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
        $this->validate($request, [
            'image' => 'nullable|image|max:2048'
        ]);
        //dd($request->all());
        $employee = Employee::find($id);
        // for employee image update
        $employeeImg = $employee->image;
        if($image = $request->file('image')){
            $employeeImg = Storage::disk('uploads')->put('employee',$image);
            Storage::disk('uploads')->delete($employee->image);
        }
        // employee info update
        $employee->update($request->except('image')+['image' => $employeeImg]);
        return redirect()->route('employees.index')->with('success', 'Employee Information upadated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $copy = $employee;
        
        if($employee->delete())
            Storage::disk('uploads')
                ->delete($copy->image);
        return redirect()->route('employees.index')->with('danger', 'Employee Information deleted successfully !');
    }
}
