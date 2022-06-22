@extends('master.master')
@section('userstyle')
    <style>
        .main-header .main-panel {
            background-color: #eee
        }

        .table .tablebrache {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="container table">
        <div class="row">
            
            <div class="col-md-12 ">
                <div class="card tablebrache">
                    <div class="card-header">
                        <h4 class="card-title">Product Details</h4>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>product name</th>
                                        <th>product description</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>product name</th>
                                        <th>product description</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($pro as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @foreach ($item->image as $i)
                                                    <a href="{{ asset('images/' . $i->url) }}"> <img
                                                            src="{{ asset('images/Thumbo/' . $i->url) }}" alt="">
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="" data-target="#updateproduct-{{ $item->id }}"
                                                    data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                                                <a href="" data-target="#deleteproduct-{{ $item->id }}"
                                                    data-toggle="modal"
                                                    class="btn btn-danger
                                                     btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @include('product.updateproduct')
                                        @include('product.deleteproduct')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('product.addproduct')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newproduct">
                        Add New Product
                    </button>
                </div>
            </div>
        </div>
    @endsection
