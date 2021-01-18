<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customer.all-customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.add-customer');
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
              'email' => 'nullable|email',
              'phone' => 'required|unique:customers',
              'company' => 'required',
              'account_holder' => 'nullable|max:255',
              'account_number' => 'nullable|max:255',
              'bank_name' => 'nullable|max:255',
              'branch_name' => 'nullable|max:255',
              'about' => 'nullable',
              'address' => 'required|max:255',
              'city' => 'required|max:255',
              'date' => 'required|date',
              'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
              ]);

              //checking if featured image (logo file) is uploaded or not 

            if($request->hasfile('photo'))
              {
                $photo = $request->photo;
                $photo_new_name = time().$photo->getClientOriginalName();
                $photo->move('uploads/customer', $photo_new_name);
                $last_photo = 'uploads/customer/' . $photo_new_name;
              }
              else {      

                $last_photo = '';
              }

        $employee = Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'about' => $request->about,
            'address' => $request->address,
            'city' => $request->city,
            'date' => $request->date,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($employee){
            $notification =  array(
                'message' => 'Customer Inserted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Customer Insertion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.single', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit-customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
              'name' => 'required|max:255',
              'email' => 'nullable|email',
              'phone' => 'required',
              'company' => 'required',
              'account_holder' => 'nullable|max:255',
              'account_number' => 'nullable|max:255',
              'bank_name' => 'nullable|max:255',
              'branch_name' => 'nullable|max:255',
              'about' => 'nullable',
              'address' => 'required|max:255',
              'city' => 'required|max:255',
              'date' => 'required|date',
              'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
              ]);

        $photo = $request->photo;
        $old_photo = $request->old_photo;
        if($photo)
              {
                $photo_new_name = time().$photo->getClientOriginalName();
                $img_success = $photo->move('uploads/customer', $photo_new_name);
                $last_photo = 'uploads/customer/' . $photo_new_name;

                if($img_success && $old_photo != ''){
                    unlink($old_photo);
                    }
              }
              else {      

                $last_photo = $old_photo;
              }

        $employee = Customer::find($customer->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'about' => $request->about,
            'address' => $request->address,
            'city' => $request->city,
            'date' => $request->date,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($employee){
            $notification =  array(
                'message' => 'Customer Inserted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Customer Insertion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $photo_del = $customer->photo;
        
        if($photo_del){
            $del = unlink($photo_del);
        }else{
            $del = true;
        }

        $delete = $customer->delete();

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
