@extends('layouts.master')

@section('title')
All Salary
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Pay Salary</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Salary</a></li>
                    <li class="active">All Salary</li>
                </ol>
            </div>
        </div>
		<!-- Employee Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Salary Information <span class="pull-right text-danger">{{ date("F Y") }}</span></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Salary</th>
                                            <th>Month</th>
                                            <th>Advance</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    @php
                                    $i = 1;
                                    @endphp
                                    <tbody>
                                        @foreach( $employees as $employee )
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td> <img src="{{ $employee->photo }}" width="60" height="60"/></td>
                                            <td>{{ $employee->salary }}</td>
                                            <td><samp class="badge badge-success">{{ date("F", strtotime('-1 months')) }}</samp></td>
                                            <td> </td>
                                            <td>                                                
                                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-md btn-success"> Pay Salary Now </a>
                                            </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- End Row -->

	</div>
</div>
</div>
@endsection

