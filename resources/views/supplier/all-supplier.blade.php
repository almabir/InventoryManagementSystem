@extends('layouts.master')

@section('title')
All Supplier
@endsection


@section('content')
<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">
    	
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Supplier Information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Supplier</a></li>
                    <li class="active">All Supplier</li>
                </ol>
            </div>
        </div>
		<!-- Employee Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Supplier Information</h3>
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
                                        @foreach( $suppliers as $supplier )
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td> <img src="{{ $supplier->photo != '' ? $supplier->photo : url('uploads/customer/man.jpg') }}" width="60" height="60"/></td>
                                            <td>{{ $supplier->company }}</td>
                                            <form action="{{route('suppliers.destroy', $supplier->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <td style="max-width: 100px !important;">
                                                <a href="{{route('suppliers.edit', $supplier->id)}}" class="btn btn-sm btn-info"> Edit </a>
                                                <button class="btn btn-sm btn-danger" id="sa-warning"> Delete </button>
                                                <a href="{{route('suppliers.show', $supplier->id)}}" class="btn btn-sm btn-primary"> View </a>
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

