@extends('layouts.master')

@section('title')
All Customer
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Customer Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Customer</a></li>
                    <li class="active">All Customer</li>
                </ol>
            </div>
        </div>
		<!-- Employee Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Customer Information</h3>
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
                                            <th>Company</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    @php
                                    $i = 1;
                                    @endphp
                                    <tbody>
                                        @foreach( $customers as $customer )
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td> <img src="{{ $customer->photo != '' ? $customer->photo : url('uploads/customer/man.jpg') }}" width="60" height="60"/></td>
                                            <td>{{ $customer->company }}</td>
                                            <form action="{{route('customers.destroy', $customer->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td style="max-width: 100px !important;">
                                                <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-sm btn-info"> Edit </a>
                                                <button class="btn btn-sm btn-danger" id="sa-warning"> Delete </button>
                                                <a href="{{route('customers.show', $customer->id)}}" class="btn btn-sm btn-primary"> View </a>
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

