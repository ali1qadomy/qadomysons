@extends('master.master')
@section('userstyle')
    <style>
        .tbodyy td {
            width: 150px;
        }

        .tbodyy .product {
            width: 350px;
        }

        .header {
            position: relative;
        }

        .header .sons {
            position: absolute;
            left: 300px;
            font-family: bold;
            font-size: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="container table">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card table brache">
                    <form action="{{ route('invoice.store') }}" method="POST">
                        @csrf
                        <div class="card-header header">
                            <div class="col">
                                <h4 class="sons">QadomySons</h4>
                                <h4 class="card-title">{{ trans('invoice.invoice') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <label for="num">invoice num :</label>
                                    <input type="number" id="num" class="form-control" min="1"
                                        onclick="getivoice();">
                                </div>
                            </div>
                        </div>
                        <div class="col-8"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label>{{ trans('invoice.customer name') }}</label>
                                    <input type="text" class="form-control" id="cusname" name="Cname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>{{ trans('invoice.phone number') }}</label>
                                    <input type="text" class="form-control" id="phnum"name="phone">
                                </div>
                                <div class="col">
                                    <label>{{ trans('invoice.address') }}</label>
                                    <input type="text" class="form-control" id="addr" name="address">
                                </div>
                                <div class="col">
                                    <label>{{ trans('invoice.sales man') }}</label>
                                    <select class="form-control" name="salesperson" id="person">
                                        <option selected> choose person sales</option>
                                        @foreach ($person as $p)
                                            <option value="{{ $p->id }}">{{ $p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="invoicetable"
                                    class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('invoice.product') }}</th>
                                            <th>{{ trans('invoice.units') }}</th>
                                            <th>{{ trans('invoice.price') }}</th>
                                            <th>{{ trans('invoice.Discount') }}</th>
                                            <th>{{ trans('invoice.total price') }}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>{{ trans('invoice.product') }}</th>
                                            <th>{{ trans('invoice.units') }}</th>
                                            <th>{{ trans('invoice.price') }}</th>
                                            <th>{{ trans('invoice.Discount') }}</th>
                                            <th>{{ trans('invoice.total price') }}</th>
                                            <th><input type="text" name="totalinvoice" class="form-control"
                                                    id="alltotal"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="tbodyy">
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" id="invoiceid" name="idinvoice">
                            <input type="hidden" id="customerid" name="idcustomer">
                            <button type="submit" name="action" value="insert"
                                class="btn btn-primary">{{ trans('invoice.save') }}</button>
                            <button type="button" id="newinvoice" onclick="newinv();" class="btn btn-success">new
                                ivoice</button>
                            <button type="submit" name="action" id="updateinvoice" value="update"
                                class="btn btn-warning">Update
                                ivoice</button>
                            <button type="submit" id="deleteinvoice" name="action" value="delete"
                                class="btn btn-danger">Deleteivoice</button>
                    </form>
                </div>
                <button class="btn btn-primary" name="addRow" id="addRow">{{ trans('invoice.AddRow') }}</button>
            </div>
        </div>
    </div>

@endsection
@section('userscript')
<script>
    $(document).ready(function() {
        var numberid;
        getivoice();
        newinv();
        /*ajax loader*/
        $.ajax({
            url: "getlastinvoice",
            type: "get",
            async: false,
            datatype: 'json',
            success: function(response) {
                $.each(response.lastid, function(key, item) {
                    $('#num').val(item.id);
                    $('#invoiceid').val(item.id);
                    numberid = item.id;
                });
            }
        });
        $.ajax({
            url: "invoiceget/" + numberid,
            method: "get",
            datatype: 'JSON',
            async: false,
            data: {
                numberid: numberid,
            },
            success: function(response) {
                $('.tbodyy').html("");
                       $.each(response.invoice, function(key,item) {

                    $('#customerid').val(item.custommer_id);
                    $('#cusname').val(item.custommer_id);
                    var row = '<tr>';
                        $.each(item.products,function(key,pro){
                            row+='<td>\<select class="js-example-basic-single form-control" name="product[]"><option value="' + pro.
                                product_id+ '">' + pro.name.{{ App::getlocale() }} + '</option></select></td>';
                                row+='<td><input name="units[]" type="number" value="' + pro.quantity+ '" class="form-control price"></td>';
                                row+='<td><input name="price[]" type="number" step="0.0000001" value="' + pro.price + '" class="form-control price"></td>';
                            row+='<td><input name="Discount[]" type="number" step="0.0000001" value="' + pro.discount + '" class="form-control price"></td>';
                            row+=' <td><input name="total[]" type="number" step="0.0000001" value="' + pro.totalPrice + '" class="form-control price all"readonly></td>';
                            row+=' <td></td>'
                            row+='</tr>';
                            });
                        $('.tbodyy').append(row);
                        });

                    $.each(response.invoice, function(key, item) {
                        $.each(item.products, function(key, pro) {

                            $('#alltotal').val(pro.totalInvoice);
                        });

                    });
            }
        });
        /*end ajax loader*/
        $('.js-example-basic-single').select2();
        $('#addRow').click(function() {
            var html = '<tr>';
            html +=
                '<td><select class="js-example-basic-single form-control" name="product[]" class="form-control"><option selected > {{ trans('invoice.type product name') }} </option>@foreach($product as $item)<option value = "{{ $item->id }}" >{{ $item->name }} </option>@endforeach </select></td> ';
            html +=
                '  <td><input name="units[]" type="number" step="0.0000001" value = "" class="form-control price"></td>';
            html +=
                '  <td><input name="price[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
            html +=
                '  <td><input name="Discount[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
            html +=
                '  <td><input name="total[]" type="number" step="0.0000001" value = 0 class="form-control price all" readonly></td>';
            html += '  <td></td>';
            html += '</tr>';
            $('#invoicetable tbody').append(html);
            $(".price").keydown(function(e) {
                var grandTotal = 0;
                var sum = 0;
                $("input[name='price[]']").each(function(index) {
                    var qty = $("input[name='units[]'] ").eq(index).val();
                    var price = $("input[name='price[]'] ").eq(index).val();
                    var Dis = $("input[name='Discount[]'] ").eq(index).val();
                    var output = (parseFloat(qty) * parseFloat(price)) - Dis;
                    sum += output;
                    if (!isNaN(output)) {
                        $("input[name='total[]']").eq(index).val(output);
                        $("#alltotal").val(sum);
                    }
                });
            });
        });
        $(".price").keydown(function(e) {
            var grandTotal = 0;
            var sum = 0;
            var sum = 0.0;
            $("input[name='price[]']").each(function(index) {
                var qty = $("input[name='units[]'] ").eq(index).val();
                var price = $("input[name='price[]'] ").eq(index).val();
                var Dis = $("input[name='Discount[]'] ").eq(index).val();
                var output = (parseFloat(qty) * parseFloat(price)) - Dis;
                sum += output;
                if (!isNaN(output)) {
                    $("input[name='total[]']").eq(index).val(output);
                    $("#alltotal").val(sum);
                }
                $("#alltotal").val(sum);
            });
        });
    });
    function newinv() {
        $('#newinvoice').on('click', function() {
            var num = $('#num').val("");
            $('.tbodyy').html("");
            $('.tbodyy').append(
                '<tr>\
                <td><select class="js-example-basic-single form-control" name="product[]"><option selected>type product name</option>@foreach($product as $item)<option value = "{{ $item->id }}" >{{ $item->name }}</option>@endforeach </select></td > \
                <td><input name = "units[]" type="number" step="0.0000001" value="0"class = "form-control price"></td>\
                <td><input name = "price[]" type="number" step="0.0000001" value="0"class = "form-control price " ></td>\
                <td><input name = "Discount[]" type="number" step="0.0000001" value="0"class = "form-control price "></td>\
                <td><input name = "total[]" type="number"  step="0.0000001" value = "0"class = "form-control price all "readonly></td>\
                <td></td>\
                </tr>'
            );
            $(".price").keydown(function(e) {
                var grandTotal = 0;
                var sum = 0;
                $("input[name='price[]']").each(function(index) {
                    var qty = $("input[name='units[]'] ").eq(index).val();
                    var price = $("input[name='price[]'] ").eq(index).val();
                    var Dis = $("input[name='Discount[]'] ").eq(index).val();
                    var output = (parseFloat(qty) * parseFloat(price)) - Dis;
                    sum += output;
                    if (!isNaN(output)) {
                        $("input[name='total[]']").eq(index).val(output);
                        $("#alltotal").val(sum);
                    }
                });
            });
        });
    }
    function getivoice() {
        $('#alltotal').val(0);
        $('#num').change(function() {
            var num = $('#num').val();
            $.ajax({
                url: "invoiceget/" + num,
                method: "get",
                datatype: 'json',
                data: {
                    num: num,
                },
                success: function(response) {
                $('.tbodyy').html("");
                    $.each(response.invoice, function(key,item) {
                        console.log(item);
                    $('#cusname').val(item.custommer_id);
                    $('#customerid').val(item.custommer_id);
                    var row = '<tr>';
                        $.each(item.products,function(key,pro){
                            row+='<td>\<select class="js-example-basic-single form-control" name="product[]"><option value="' + pro.product_id+ '">' + pro.name.{{ App::getlocale() }} + '</option></select></td>';
                            row+='<td><input name="units[]" type="number" step="0.0000001" value="' + pro.quantity+ '" class="form-control price"></td>';
                            row+='<td><input name="price[]" type="number" step="0.0000001" value="' + pro.price + '" class="form-control price"></td>';
                            row+='<td><input name="Discount[]" type="number" step="0.0000001" value="' + pro.discount + '" class="form-control price"></td>';
                            row+=' <td><input name="total[]" type="number" step="0.0000001" value="' + pro.totalPrice + '" class="form-control price all"readonly></td>';
                            row+=' <td></td></tr>';
                            }); $('.tbodyy').append(row);
                        });


                    $.each(response.invoice, function(key, item) {
                        $.each(item.products, function(key, pro) {

                            $('#alltotal').val(pro.totalInvoice);
                        });

                    });
                    }
            });
        });

    }


</script>
@endsection
