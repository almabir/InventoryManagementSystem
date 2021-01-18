@extends('layouts.master')

@section('title')
Add Advance Salary
@endsection

@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Advance Salary Form</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Advance Salary</a></li>
                    <li class="active">Add Advance Salary</li>
                </ol>
            </div>
        </div>
		<!-- Employee Add Form -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="panel panel-default">
			        <div class="panel-heading"><h3 class="panel-title"> Add New Advance Salary</h3></div>
			        <div class="panel-body">
			            <form role="form" action="{{ route('advances.store') }}" method="POST" enctype="multipart/form-data">
			            	@csrf
			            	<div class="form-group">
			                    <label for="date">Advanced Date</label>
			                    <input name="date" type="date" class="form-control" id="date">
			                </div>
			                <div class="form-group">
			                    <label for="emp_id">Employee Name</label>
			                    <select name="emp_id" type="text" class="form-control" id="emp_id">
			                    	@foreach( $employees as $employee)
			                    	<option value="{{ $employee->id }}">{{ $employee->name }}</option>
			                    	@endforeach
			                    </select>
			                </div>
			               	<div class="form-group">
			                    <label for="month">Month</label>
			                    <select name="month" type="text" class="form-control" id="month">
			                    	<option value="January">January</option>
			                    	<option value="February">February</option>
			                    	<option value="March">March</option>
			                    	<option value="April">April</option>
			                    	<option value="May">May</option>
			                    	<option value="June">June</option>
			                    	<option value="July">July</option>
			                    	<option value="August">August</option>
			                    	<option value="September">September</option>
			                    	<option value="October">October</option>
			                    	<option value="November">November</option>
			                    	<option value="December">December</option>
			                    </select>
			                </div>
			                <div class="form-group">
			                    <label for="year">Year</label>
			                    <input name="year" type="number" class="form-control" id="year" placeholder="Enter Year">
			                </div>
			                <div class="form-group">
			                    <label for="advance">Advanced Amount</label>
			                    <input name="advance" type="number" class="form-control" id="advance" placeholder="Enter Advanced Amount">
			                </div>				                
			               	<div class="form-group">
			                    <label for="note">Reason for Advanced</label>
			                    <textarea name="note" class="form-control" id="note" placeholder="Enter Reason for Advanced"></textarea>
			                </div>
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

