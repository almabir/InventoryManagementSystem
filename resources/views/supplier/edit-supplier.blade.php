@extends('layouts.master')

@section('title')
Edit Supplier
@endsection

@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Edit Supplier Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Supplier</a></li>
                    <li class="active">Edit Supplier</li>
                </ol>
            </div>
        </div>
		<!-- Employee Add Form -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel panel-default">
			        <div class="panel-heading"><h3 class="panel-title"> Edit Supplier</h3></div>
			        <div class="panel-body">
			            <form role="form" action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			            	@method('PUT')
			            	<div class="form-group">
			                    <label for="date">Creation Date</label>
			                    <input name="date" type="date" class="form-control" id="date" value="{{ $supplier->date }}">
			                </div>
			                <div class="form-group">
			                    <label for="name">Customer Name</label>
			                    <input name="name" type="text" class="form-control" id="name" value="{{ $supplier->name }}" placeholder="Enter Customer Name">
			                </div>
			               	<div class="form-group">
			                    <label for="email">Email Address</label>
			                    <input name="email" type="email" class="form-control" id="email" value="{{ $supplier->email }}" placeholder="Enter Email Address">
			                </div>
			                <div class="form-group">
			                    <label for="phone">Phone No</label>
			                    <input name="phone" type="number" class="form-control" id="phone" value="{{ $supplier->phone }}" placeholder="Enter Phone Number">
			                </div>
			                <div class="form-group">
			                    <label for="type">Type</label>
			                    <select name="type" class="form-control" id="type">
			                    	<option value="Distributor" @php if($supplier->type == 'Distributor') echo 'Selected'; @endphp >Distributor</option>
			                    	<option value="Whole Saller" @php if($supplier->type == 'Whole Saller') echo 'Selected'; @endphp>Whole Saller</option>
			                    	<option value="Broker" @php if($supplier->type == 'Broker') echo 'Selected'; @endphp>Broker</option>
			                    </select>
			                </div>
			                <div class="form-group">
			                    <label for="company">Company</label>
			                    <input name="company" type="text" class="form-control" id="company" value="{{ $supplier->company }}" placeholder="Enter Company Name">
			                </div>
			                <div class="form-group">
			                    <label for="bank_name">Bank Name</label>
			                    <input name="bank_name" type="text" class="form-control" id="bank_name" value="{{ $supplier->bank_name }}" placeholder="Enter Bank Name">
			                </div>
			                <div class="form-group">
			                    <label for="branch_name">Branch Name</label>
			                    <input name="branch_name" type="text" class="form-control" id="branch_name" placeholder="Enter Branch Name" value="{{ $supplier->branch_name }}">
			                </div>
			                <div class="form-group">
			                    <label for="account_holder">Bank Account Holder's Name</label>
			                    <input name="account_holder" type="text" class="form-control" id="account_holder" placeholder="Enter Bank Account Holder's Name" value="{{ $supplier->account_holder }}">
			                </div>
			                <div class="form-group">
			                    <label for="account_number">Account Number</label>
			                    <input name="account_number" type="number" class="form-control" id="account_number" placeholder="Enter Account Number" value="{{ $supplier->account_number }}">
			                </div>
			                
			                <div class="form-group">
			                    <label for="city">City</label>
			                    <input name="city" type="text" class="form-control" id="city" placeholder="Enter City" value="{{ $supplier->city }}">
			                </div>
			               	<div class="form-group">
			                    <label for="address">Address</label>
			                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address"> {{ $supplier->address }}</textarea>
			                </div>
			               	<div class="form-group">
			                    <label for="about">About</label>
			                    <textarea name="about" class="form-control" id="about" placeholder="Enter Details About Customer"> {{ $supplier->about }}</textarea>
			                </div>
			                <div class="form-group">
			                	<label for="photo">Photo</label>                
			                    <input accept="image/*" onchange="preview_image(event)" name="photo" type="file" class="form-control" id="photo">
			                    <img src="{{ $supplier->photo != '' ? url($supplier->photo) : url('uploads/customer/man.jpg') }}"" id="output_image" style="width: 150px;"/> 
			                </div>
			                <input type="hidden" name="old_photo" value="{{ $supplier->photo }}">
			                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Supplier</button>
			            </form>
			        </div><!-- panel-body -->
			    </div> <!-- panel -->
			</div> <!-- col-->
		</div>
	</div>
</div>
</div>
@endsection

