<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('employee.all-employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add-employee');
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
              'name' => 'required|max:255',
              'email' => 'required|email|unique:employees',
              'phone' => 'required|unique:employees',
              'nid_no' => 'required|max:255',
              'experience' => 'required|max:255',
              'salary' => 'required|max:255',
              'address' => 'required|max:255',
              'city' => 'required|max:255',
              'vacation' => 'required|max:255',
              'photo' => 'required|mimes:jpg,jpeg,png,gif',
              ]);

              //checking if featured image (logo file) is uploaded or not 

            if($request->hasfile('photo'))
              {
                $photo = $request->photo;
                $photo_new_name = time().$photo->getClientOriginalName();
                $photo->move('uploads/employees', $photo_new_name);
                $last_photo = 'uploads/employees/' . $photo_new_name;
              }
              else {      

                $notification =  array(
                'message' => 'Image is not uploaded', 
                'alert-type' => 'warning',
                );
              }

            $employee = Employee::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid_no' => $request->nid_no,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'address' => $request->address,
            'city' => $request->city,
            'vacation' => $request->vacation,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($employee){
            $notification =  array(
                'message' => 'Employee Inserted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Employee Insertion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
             
            return view('employee.single', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
         return view('employee.edit-employee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {  
        $this->validate($request, [
              'name' => 'required|max:255',
              'email' => 'required|email',
              'phone' => 'required',
              'nid_no' => 'required|max:255',
              'experience' => 'required|max:255',
              'salary' => 'required|max:255',
              'address' => 'required|max:255',
              'city' => 'required|max:255',
              'vacation' => 'required|max:255',
              ]);

        //checking if featured image (logo file) is updated or not 
        //$photo = $request->photo;
        $photo = $request->photo;
        if($photo)
              {

                $photo_new_name = time().$photo->getClientOriginalName();
                $img_success = $photo->move('uploads/employees', $photo_new_name);
                $last_photo = 'uploads/employees/' . $photo_new_name;

                if($img_success){
                    $old_photo = $request->old_photo;
                    unlink($old_photo);
                    }
              }
            else {      

                $last_photo = $request->old_photo;
              }


        $data = Employee::find($employee->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid_no' => $request->nid_no,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'address' => $request->address,
            'city' => $request->city,
            'vacation' => $request->vacation,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($data){
            $notification =  array(
                'message' => 'Employee Deleted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Employee Deletion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $photo_del = $employee->photo;
        $del = unlink($photo_del);
        $delete = $employee->delete();

        if($delete && $del){
            $notification =  array(
                'message' => 'Employee Deleted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Employee Deletion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }
}
