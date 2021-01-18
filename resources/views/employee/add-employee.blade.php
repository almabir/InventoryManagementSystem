@extends('layouts.master')

@section('title')
Add New Employee
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Employee Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Employee</a></li>
                    <li class="active">Add New Employee</li>
                </ol>
            </div>
        </div>
		<!-- Employee Add Form -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel panel-default">
			        <div class="panel-heading"><h3 class="panel-title"> Add New Employee</h3></div>
			        <div class="panel-body">
			            <form role="form" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			                <div class="form-group">
			                    <label for="employee_name">Employee Name</label>
			                    <input name="name" type="text" class="form-control" id="employee_name" placeholder="Enter Employee Name">
			                </div>
			               	<div class="form-group">
			                    <label for="email">Email Address</label>
			                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email">
			                </div>
			                <div class="form-group">
			                    <label for="phone">Phone No</label>
			                    <input name="phone" type="number" class="form-control" id="phone" placeholder="Enter Phone">
			                </div>
			                <div class="form-group">
			                    <label for="nid_no">National ID No</label>
			                    <input name="nid_no" type="number" class="form-control" id="nid_no" placeholder="Enter National ID Number">
			                </div>
			                <div class="form-group">
			                    <label for="salary">Salary</label>
			                    <input name="salary" type="number" class="form-control" id="salary" placeholder="Enter Salary Amount">
			                </div>
			                <div class="form-group">
			                    <label for="vacation">Vacation</label>
			                    <input name="vacation" type="text" class="form-control" id="vacation" placeholder="Enter Vacation">
			                </div>
			                <div class="form-group">
			                    <label for="city">City</label>
			                    <input name="city" type="text" class="form-control" id="city" placeholder="Enter City">
			                </div>
			               	<div class="form-group">
			                    <label for="address">Address</label>
			                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address"></textarea>
			                </div>
			               	<div class="form-group">
			                    <label for="experience">Experience</label>
			                    <textarea name="experience" class="form-control" id="experience" placeholder="Enter Experience"></textarea>
			                </div>
			                <div class="form-group">
			                	<label for="photo">Photo</label>                
			                    <input accept="image/*" onchange="preview_image(event)" name="photo" type="file" class="form-control" id="photo">
			                    <img id="output_image" style="width: 150px;"/> 
			                </div>
			                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Employee</button>
			            </form>
			        </div><!-- panel-body -->
			    </div> <!-- panel -->
			</div> <!-- col-->
		</div>
	</div>
</div>
</div>
@endsection

