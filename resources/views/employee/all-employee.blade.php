@extends('layouts.master')

@section('title')
All Employee
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
                    <li class="active">All Employee</li>
                </ol>
            </div>
        </div>
		<!-- Employee Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Employee Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>Salary</th>
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
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td> <img src="{{ $employee->photo }}" width="60" height="60"/></td>
                                            <td>{{ $employee->salary }}</td>
                                            <form action="{{route('employees.destroy', $employee->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td style="max-width: 100px !important;">
                                                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-sm btn-info"> Edit </a>
                                                <button class="btn btn-sm btn-danger" id="sa-warning"> Delete </button>
                                                <a href="{{route('employees.show', $employee->id)}}" class="btn btn-sm btn-primary"> View </a>
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

