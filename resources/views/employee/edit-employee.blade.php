@extends('layouts.master')

@section('title')
Edit Employee
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Edit Employee Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Employee</a></li>
                    <li class="active">Edit Employee</li>
                </ol>
            </div>
        </div>
		<!-- Employee Add Form -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel panel-default">
			        <div class="panel-heading"><h3 class="panel-title"> Edit Employee</h3></div>
			        <div class="panel-body">
			            <form role="form" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			            	@method('PUT')
			                <div class="form-group">
			                    <label for="employee_name">Employee Name</label>
			                    <input name="name" type="text" class="form-control" id="employee_name" value="{{ $employee->name }}">
			                </div>
			               	<div class="form-group">
			                    <label for="email">Email Address</label>
			                    <input name="email" type="email" class="form-control" id="email" value="{{ $employee->email }}">
			                </div>
			                <div class="form-group">
			                    <label for="phone">Phone No</label>
			                    <input name="phone" type="number" class="form-control" id="phone" value="{{ $employee->phone }}">
			                </div>
			                <div class="form-group">
			                    <label for="nid_no">National ID No</label>
			                    <input name="nid_no" type="number" class="form-control" id="nid_no" value="{{ $employee->nid_no }}">
			                </div>
			                <div class="form-group">
			                    <label for="salary">Salary</label>
			                    <input name="salary" type="number" class="form-control" id="salary" value="{{ $employee->salary }}">
			                </div>
			                <div class="form-group">
			                    <label for="vacation">Vacation</label>
			                    <input name="vacation" type="text" class="form-control" id="vacation" value="{{ $employee->vacation }}">
			                </div>
			                <div class="form-group">
			                    <label for="city">City</label>
			                    <input name="city" type="text" class="form-control" id="city" value="{{ $employee->city }}">
			                </div>
			               	<div class="form-group">
			                    <label for="address">Address</label>
			                    <textarea name="address" class="form-control" id="address" >{{ $employee->address }}</textarea>
			                </div>
			               	<div class="form-group">
			                    <label for="experience">Experience</label>
			                    <textarea name="experience" class="form-control" id="experience" >{{ $employee->experience }}</textarea>
			                </div>
			                <div class="form-group">
			                	<label for="photo">Photo</label>                
			                    <input accept="image/*" onchange="preview_image(event)" name="photo" type="file" class="form-control" id="photo">
			                    <img src="{{ url($employee->photo) }}" id="output_image" style="width: 150px;"/> 
			                </div>
			                <input type="hidden" name="old_photo" value="{{ $employee->photo }}">
			                <button type="submit" class="btn btn-purple waves-effect waves-light">Update Employee</button>
			            </form>
			        </div><!-- panel-body -->
			    </div> <!-- panel -->
			</div> <!-- col-->
		</div>
	</div>
</div>
</div>
@endsection

