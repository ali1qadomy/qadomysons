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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card-header">
                        <h4 class="card-title">{{ trans('branche.branche') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('branche.id') }}</th>
                                        <th>{{ trans('branche.name') }}</th>
                                        <th>{{ trans('branche.# of employee') }}</th>
                                        <th>{{ trans('branche.action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('branche.id') }}</th>
                                        <th>{{ trans('branche.name') }}</th>
                                        <th>{{ trans('branche.# of employee') }}</th>
                                        <th>{{ trans('branche.action') }}</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($bra as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->user->count() }}</td>
                                            <td>
                                                <a href="" data-target="#updatebranche-{{ $item->id }}"
                                                    data-toggle="modal" class="btn btn-success btn-sm">{{ trans('branche.edit') }}</a>
                                                <a href="" data-target="#deletebranche-{{ $item->id }}"
                                                    data-toggle="modal" class="btn btn-danger btn-sm">{{ trans('branche.delete') }}</a>
                                            </td>
                                        </tr>
                                        @include('branche.updatebranche')
                                        @include('branche.deletebranche')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('branche.addnewbranche')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newbranche">
                      {{ trans('branche.Add New Branche') }}
                    </button>
                </div>
            </div>
        </div>
    @endsection
