@extends('layouts.master')

@section('title')
Edit Customer
@endsection

@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Edit Customer Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Customer</a></li>
                    <li class="active">Edit Customer</li>
                </ol>
            </div>
        </div>
		<!-- Employee Add Form -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel panel-default">
			        <div class="panel-heading"><h3 class="panel-title"> Edit Customer</h3></div>
			        <div class="panel-body">
			            <form role="form" action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			            	@method('PUT')
			            	<div class="form-group">
			                    <label for="date">Creation Date</label>
			                    <input name="date" type="date" class="form-control" id="date" value="{{ $customer->date }}">
			                </div>
			                <div class="form-group">
			                    <label for="name">Customer Name</label>
			                    <input name="name" type="text" class="form-control" id="name" value="{{ $customer->name }}" placeholder="Enter Customer Name">
			                </div>
			               	<div class="form-group">
			                    <label for="email">Email Address</label>
			                    <input name="email" type="email" class="form-control" id="email" value="{{ $customer->email }}" placeholder="Enter Email Address">
			                </div>
			                <div class="form-group">
			                    <label for="phone">Phone No</label>
			                    <input name="phone" type="number" class="form-control" id="phone" value="{{ $customer->phone }}" placeholder="Enter Phone Number">
			                </div>
			                <div class="form-group">
			                    <label for="company">Company</label>
			                    <input name="company" type="text" class="form-control" id="company" value="{{ $customer->company }}" placeholder="Enter Company Name">
			                </div>
			                <div class="form-group">
			                    <label for="bank_name">Bank Name</label>
			                    <input name="bank_name" type="text" class="form-control" id="bank_name" value="{{ $customer->bank_name }}" placeholder="Enter Bank Name">
			                </div>
			                <div class="form-group">
			                    <label for="branch_name">Branch Name</label>
			                    <input name="branch_name" type="text" class="form-control" id="branch_name" placeholder="Enter Branch Name" value="{{ $customer->branch_name }}">
			                </div>
			                <div class="form-group">
			                    <label for="account_holder">Bank Account Holder's Name</label>
			                    <input name="account_holder" type="text" class="form-control" id="account_holder" placeholder="Enter Bank Account Holder's Name" value="{{ $customer->account_holder }}">
			                </div>
			                <div class="form-group">
			                    <label for="account_number">Account Number</label>
			                    <input name="account_number" type="number" class="form-control" id="account_number" placeholder="Enter Account Number" value="{{ $customer->account_number }}">
			                </div>
			                
			                <div class="form-group">
			                    <label for="city">City</label>
			                    <input name="city" type="text" class="form-control" id="city" placeholder="Enter City" value="{{ $customer->city }}">
			                </div>
			               	<div class="form-group">
			                    <label for="address">Address</label>
			                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address"> {{ $customer->address }}</textarea>
			                </div>
			               	<div class="form-group">
			                    <label for="about">About</label>
			                    <textarea name="about" class="form-control" id="about" placeholder="Enter Details About Customer"> {{ $customer->about }}</textarea>
			                </div>
			                <div class="form-group">
			                	<label for="photo">Photo</label>                
			                    <input accept="image/*" onchange="preview_image(event)" name="photo" type="file" class="form-control" id="photo">
			                    <img src="{{ $customer->photo != '' ? url($customer->photo) : url('uploads/customer/man.jpg') }}"" id="output_image" style="width: 150px;"/> 
			                </div>
			                <input type="hidden" name="old_photo" value="{{ $customer->photo }}">
			                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Customer</button>
			            </form>
			        </div><!-- panel-body -->
			    </div> <!-- panel -->
			</div> <!-- col-->
		</div>
	</div>
</div>
</div>
@endsection

