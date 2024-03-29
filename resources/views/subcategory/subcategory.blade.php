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
                        <h4 class="card-title">{{ trans('sub_category.Sub_Category') }}</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('sub_category.id') }}</th>
                                        <th>{{ trans('sub_category.name') }}</th>
                                        <th>{{ trans('sub_category.description') }}</th>
                                        <th>{{ trans('sub_category.Category Name') }}</th>
                                        <th>{{ trans('sub_category.Action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('sub_category.id') }}</th>
                                        <th>{{ trans('sub_category.name') }}</th>
                                        <th>{{ trans('sub_category.description') }}</th>
                                        <th>{{ trans('sub_category.Category Name') }}</th>
                                        <th>{{ trans('sub_category.Action') }}</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($sub as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                <a href="" data-target="#updatesub-{{ $item->id }}"
                                                    data-toggle="modal" class="btn btn-success btn-sm">{{ trans('sub_category.edit') }}</a>
                                                <a href="" data-target="#deletesub-{{ $item->id }}"
                                                    data-toggle="modal"
                                                    class="btn btn-danger
                                                     btn-sm">{{ trans('sub_category.delete') }}</a>
                                            </td>
                                        </tr>
                                        @include('subcategory.updatesubcategory')
                                        @include('subcategory.deletesubcategory')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('subcategory.newsub')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newSub">
                        {{ trans('sub_category.Add New Sub_Category') }}
                    </button>
                </div>
            </div>
        </div>
    @endsection
