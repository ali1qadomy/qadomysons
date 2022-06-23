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
                        <h4 class="card-title">{{ trans('product.Product Details') }}</h4>
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
                                        <th>{{ trans('product.id') }}</th>
                                        <th>{{ trans('product.product name') }}</th>
                                        <th>{{ trans('product.product description') }}</th>
                                        <th>{{ trans('product.image') }}</th>
                                        <th>{{ trans('product.Action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('product.id') }}</th>
                                        <th>{{ trans('product.product name') }}</th>
                                        <th>{{ trans('product.product description') }}</th>
                                        <th>{{ trans('product.image') }}</th>
                                        <th>{{ trans('product.Action') }}</th>
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
                                                    data-toggle="modal" class="btn btn-success btn-sm">{{ trans('product.EDIT') }}</a>
                                                <a href="" data-target="#deleteproduct-{{ $item->id }}"
                                                    data-toggle="modal"
                                                    class="btn btn-danger
                                                     btn-sm">{{ trans('product.Delete') }}</a>
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
                        {{ trans('product.Add New Product') }}
                    </button>
                </div>
            </div>
        </div>
    @endsection
