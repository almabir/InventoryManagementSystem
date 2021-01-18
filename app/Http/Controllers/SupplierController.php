<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('supplier.all-supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.add-supplier');
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
              'phone' => 'required|unique:suppliers',
              'company' => 'required',
              'account_holder' => 'nullable|max:255',
              'account_number' => 'nullable|max:255',
              'bank_name' => 'nullable|max:255',
              'branch_name' => 'nullable|max:255',
              'about' => 'nullable',
              'address' => 'required|max:255',
              'city' => 'required|max:255',
              'date' => 'required|date',
              'type' => 'required|max:255',
              'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
              ]);

              //checking if featured image (logo file) is uploaded or not 

            if($request->hasfile('photo'))
              {
                $photo = $request->photo;
                $photo_new_name = time().$photo->getClientOriginalName();
                $photo->move('uploads/supplier', $photo_new_name);
                $last_photo = 'uploads/supplier/' . $photo_new_name;
              }
              else {      

                $last_photo = '';
              }

        $supplier = Supplier::insert([
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
            'type' => $request->type,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($supplier){
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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('supplier.single', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit-supplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
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
              'type' => 'required|max:255',
              'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
              ]);

        $photo = $request->photo;
        $old_photo = $request->old_photo;
        if($photo)
              {
                $photo_new_name = time().$photo->getClientOriginalName();
                $img_success = $photo->move('uploads/supplier', $photo_new_name);
                $last_photo = 'uploads/supplier/' . $photo_new_name;

                if($img_success && $old_photo != ''){
                    unlink($old_photo);
                    }
              }
              else {      

                $last_photo = $old_photo;
              }

        $supplier = Supplier::find($supplier->id)->update([
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
            'type' => $request->type,
            'photo' => $last_photo,
            'created_at' => Carbon::now(),
        ]);

        if($supplier){
            $notification =  array(
                'message' => 'Supplier Inserted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Supplier Insertion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $photo_del = $supplier->photo;
        
        if($photo_del){
            $del = unlink($photo_del);
        }else{
            $del = true;
        }

        $delete = $supplier->delete();

        if($delete && $del){
            $notification =  array(
                'message' => 'Supplier Deleted Successfully', 
                'alert-type' => 'success',
            );
        }else{
            $notification =  array(
                'message' => 'Error Occured During Supplier Deletion', 
                'alert-type' => 'error',
            );  
        }
        return redirect()->back()->with($notification);
    }
}
