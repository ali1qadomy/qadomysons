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
                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>category name</th>
                                        <th>category description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>category name</th>
                                        <th>category description</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($cat as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a href="" data-target="#updatecategory-{{ $item->id }}"
                                                    data-toggle="modal" class="btn btn-success btn-sm">EDIT</a>
                                                <a href="" data-target="#deletecategory-{{ $item->id }}"
                                                    data-toggle="modal"
                                                    class="btn btn-danger
                                                     btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @include('category.updatecategory')
                                        @include('category.deletecategory')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('category.addnewcategory')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newcategory">
                        Add New Category
                    </button>
                </div>
            </div>
        </div>
    @endsection
