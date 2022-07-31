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
                        <h4 class="card-title">{{ trans('category.categories') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('category.id') }}</th>
                                        <th>{{ trans('category.category name') }}</th>
                                        <th>{{ trans('category.category description') }}</th>
                                        <th>{{ trans('category.action') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ trans('category.id') }}</th>
                                        <th>{{ trans('category.category name') }}</th>
                                        <th>{{ trans('category.category description') }}</th>
                                        <th>{{ trans('category.action') }}</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @include('category.updatecategory')
                                    @include('category.deletecategory')
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('category.addnewcategory')
                    <button type="button" class="btn btn-primary addcategory" data-toggle="modal"
                        data-target="#newcategory">
                        {{ trans('category.Add New Category') }}
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('category.new category') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="content">

                        </div>
                    </div>
                </div>
            </div>

        @endsection
        @section('userscript')
            <script>
                $(document).ready(function(e) {
                    readrecored();

                    function readrecored() {
                        $.ajax({
                            url: "readtable",
                            type: "get",
                            dataType: "JSON",
                            success: function(data) {
                                $('tbody').html("");
                                $.each(data.category, function(key, item) {
                                    $('tbody').append(
                                        '<tr>\
                        <td>'+item.id +'</td>\
                        <td>' + item.name.{{ App::getlocale() }} +'</td>\
                        <td>' + item.description.{{ App::getlocale() }} +'</td>\
                        <td><button type="button" value="' + item.id + '" class ="editbtn btn btn-primary btn-sm">edit</button> \
                            <button type="button" value = "' + item.id + '" class ="deletebtn btn btn-danger btn-sm">Delete</button></td>\
                                                                                                                             </tr>'
                                    );
                                });
                            }
                        });
                    }
                    $(document).on('click', '.editbtn', function(e) {
                        e.preventDefault();
                        var cat_id = $(this).val();
                        $('#updatecategory').modal('show');
                        $.ajax({
                            url: "updateCategories/" + cat_id,
                            method: "get",
                            dataType: "JSON",
                            success: function(response) {
                                $('.ucategoryNameEn').val(response.category[0].name.en);
                                $('.ucategoryDescEn').val(response.category[0].description.en);
                                $('.ucategoryNameAr').val(response.category[0].name.ar);
                                $('.ucategoryDescAr').val(response.category[0].description.ar);
                                $('.updatecategoryid').val(cat_id);

                            }
                        });
                    });
                    $(document).on('click', '.savecategory', function(e) {
                        e.preventDefault();
                        var data = {
                            'categorynameen': $('.nameEn').val(),
                            'categorynamear': $('.nameAr').val(),
                            'categorydescen': $('.descEn').val(),
                            'categorydescar': $('.descAr').val()
                        }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "addCategories",
                            method: "POST",
                            dataType: "json",
                            data: data,
                            success: function(response) {
                                $('.content').text(response.message);
                                $('#alert').modal('hide');
                                $('#newcategory').modal('hide');
                                $('#newcategory').find('input').val("");
                                readrecored();
                            }
                        });
                    });
                    $(document).on('click', '.updatecategoriess', function() {
                        var category_id = $('.updatecategoryid').val();
                        var data = {
                            'categorynameen': $('.ucategoryNameEn').val(),
                            'categorydescen': $('.ucategoryDescEn').val(),
                            'categorynamear': $('.ucategoryNameAr').val(),
                            'categorydescar': $('.ucategoryDescAr').val(),
                        }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "editupdatecategory/" + category_id,
                            method: "PUT",
                            dataType: "JSON",
                            data: data,
                            success: function(response) {
                                $('#updatecategory').modal('hide');
                                $('#updatecategory').find('input').val("");
                                readrecored();
                            }
                        });
                    });
                    $(document).on('click', '.deletebtn', function(e) {
                        e.preventDefault();
                        var cat_id_delete = $(this).val();
                        $('.categoryid').val(cat_id_delete);
                        $('#deletecategory').modal('show');

                    });
                    $(document).on('click', '.deleteecategoryy', function(e) {
                        e.preventDefault();
                        var cat_id=$('.categoryid').val();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "deletecategorymodel/" + cat_id,
                            method: "DELETE",
                            data: {
                                cat_id: cat_id
                            },
                            success: function(response) {
                                $('#deletecategory').modal('hide');
                                $('#deletecategory').find('input').val("");
                                readrecored();
                            }
                    });
                });
            });
            </script>
        @endsection
