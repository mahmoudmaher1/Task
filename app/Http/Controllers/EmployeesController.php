<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    public function _construct()
    {
        $this->middleware(['role:Employees Page']);
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee= DB::table('employees')->simplePaginate(5);
        return view('employees.index' , compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstName'=>'required',
            'lastName'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'image'=>'required',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success' , 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show' , compact('employee'));

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
        return view('employees.edit' , compact('employee'));
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
        $this->validate($request,[
            'firstName'=>'required',
            'lastName'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'image'=>'required',
        ]);
        Employee::find($id)->update($request->all());
        return redirect()->route('employees.index')->with('success' , 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return back()->with('success' , 'deleted Successfully');
    }
}
