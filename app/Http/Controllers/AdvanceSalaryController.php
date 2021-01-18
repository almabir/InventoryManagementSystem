<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class AdvanceSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advances = AdvanceSalary::latest()->get();
        return view('salary.all-advanced', compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::latest()->get();
        return view('salary.add-advance', compact('employees'));
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
              'emp_id' => 'required|max:255',
              'month' => 'required',
              'advance' => 'required',
              'year' => 'required',
              'date' => 'required|date',
              'note' => 'nullable|max:255',
              ]);

        $all_advanced = AdvanceSalary::get()
                            ->where('month', $request->month)
                            ->where('emp_id', $request->emp_id)
                            ->first();

        if( $all_advanced === NULL){
            $advanced = AdvanceSalary::insert([
                'emp_id' => $request->emp_id,
                'month' => $request->month,
                'advance' => $request->advance,
                'year' => $request->year,
                'date' => $request->date,
                'note' => $request->note,
                'created_at' => Carbon::now(),
            ]);

            if($advanced){
                $notification =  array(
                    'message' => 'Advance Salary Inserted Successfully', 
                    'alert-type' => 'success',
                );
            }else{
                $notification =  array(
                    'message' => 'Error Occured During Advance Salary Insertion', 
                    'alert-type' => 'error',
                );  
            }

            return redirect()->back()->with($notification);

        }else{

        $notification =  array(
                'message' => 'Oopss! Advanced Already Paid in this Month!!', 
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvanceSalary  $advanceSalary
     * @return \Illuminate\Http\Response
     */
    public function show(AdvanceSalary $advanceSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvanceSalary  $advanceSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvanceSalary $advanceSalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvanceSalary  $advanceSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvanceSalary $advanceSalary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvanceSalary  $advanceSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvanceSalary $advanceSalary)
    {
        //
    }
}
