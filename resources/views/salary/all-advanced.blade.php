@extends('layouts.master')

@section('title')
All Advanced Salary
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">All Advanced Salary Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">All Advanced Salary</a></li>
                    <li class="active">Advanced Salary</li>
                </ol>
            </div>
        </div>
		<!-- Employee Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Advanced Salary Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Amount</th>
                                            <th>Reason</th>
                                            <th>Taken Date</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $advances as $advance )
                                        <tr>
                                            <td>{{ $advance->emp_id }}</td>
                                            <td>{{ $advance->month }}</td>
                                            <td>{{ $advance->year }}</td>
                                            <td>{{ $advance->advance }}</td>
                                            <td>{{ $advance->note }}</td>
                                            <td>{{ $advance->date }}</td>
                                            <form action="{{route('employees.destroy', $advance->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td style="max-width: 100px !important;">
                                                <a href="{{route('employees.edit', $advance->id)}}" class="btn btn-sm btn-info"> Edit </a>
                                                <button class="btn btn-sm btn-danger" id="sa-warning"> Delete </button>
                                                <a href="{{route('employees.show', $advance->id)}}" class="btn btn-sm btn-primary"> View </a>
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

