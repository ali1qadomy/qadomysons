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
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="card-header header">
                            <div class="col">
                                <h4 class="sons">QadomySons</h4>
                                <h4 class="card-title">{{ trans('invoice.Catch Receipt') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2">
                                    <label for="num">invoice num :</label>
                                    <input type="number" id="num" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-8"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label>{{ trans('invoice.customer name') }}</label>
                                    <select class="js-example-basic-single form-control" id="cusname" name="Cname">
                                        <option selected>choose customer name</option>
                                        @foreach ($customer as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>{{ trans('invoice.phone number') }}</label>
                                    <input type="text" class="form-control" id="phnum"name="phone">
                                </div>
                                <div class="col-4">
                                    <label>{{ trans('invoice.address') }}</label>
                                    <input type="text" class="form-control" id="addr" name="address">
                                </div>
                                <div class="col-4">
                                    <label></label>
                                    <select class="form-control" name="invoiceId" id="person">
                                        <option selected>choose invoice</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="invoicetable"
                                    class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('invoice.price') }}</th>
                                            <th>{{ trans('invoice.Discount') }}</th>
                                            <th>{{ trans('invoice.paymentMethod') }}</th>
                                            <th>{{ trans('invoice.total price') }}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>{{ trans('invoice.price') }}</th>
                                            <th>{{ trans('invoice.Discount') }}</th>
                                            <th>{{ trans('invoice.paymentMethod') }}</th>
                                            <th>{{ trans('invoice.total price') }}</th>
                                            <th><input type="text" name="totalinvoice" class="form-control"
                                                    id="alltotal"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="tbodyy">
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" value="insert"
                                class="btn btn-primary">{{ trans('invoice.save') }}</button>
                            <button type="button" id="newinvoice" class="btn btn-success">new invoice</button>
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
            $('.js-example-basic-single').select2();
            /*ajax get lastinvoice id*/

            $('#alltotal').val(0);
            /* append one row when open page*/
            var html = '<tr>';
            html +=
                '  <td><input name="price[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
            html +=
                '  <td><input name="Discount[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
            html +=
                '  <td><select class="form-control" name="paymentMethod[]" id="person"> <option selected > payment Method </option><option value = "Cash" > cash </option> <option value = "Check" > check </option> <option value = "Visa" > visa </option> </select></td>';
            html +=
                '  <td><input name="total[]" type="number" step="0.0000001" value = 0 class="form-control price all" readonly></td>';

            html += '  <td></td>';
            html += '</tr>';
            $('#invoicetable tbody').append(html);
            /* end append one row when open page*/

            /*end ajax loader*/

            $('#addRow').click(function() {
                var html = '<tr>';
                html +=
                    '  <td><input name="price[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
                html +=
                    '  <td><input name="Discount[]" type="number" step="0.0000001" value = 0 class="form-control price"></td>';
                html +=
                    '  <td><select class="form-control" name="paymentMethod[]" id="person"> <option selected > payment Method </option><option value = "Cash" > cash </option> <option value = "Check" > check </option> <option value = "Visa" > visa </option> </select></td>';
                html +=
                    '  <td><input name="total[]" type="number" step="0.0000001" value = 0 class="form-control price all" readonly></td>';
                html += '  <td></td>';
                html += '</tr>';
                $('#invoicetable tbody').append(html);
                $(".price").keydown(function(e) {
                    var grandTotal = 0;
                    var sum = 0;
                    $("input[name='price[]']").each(function(index) {
                        var price = $("input[name='price[]'] ").eq(index).val();
                        var Dis = $("input[name='Discount[]'] ").eq(index).val();
                        var output = parseFloat(price) - parseFloat(Dis);
                        sum += output;
                        if (!isNaN(output)) {
                            $("input[name='total[]']").eq(index).val(output);

                        }
                        $("#alltotal").val(sum);
                    });
                });
            });
            $(".price").keydown(function(e) {
                var grandTotal = 0;
                var sum = 0.0;
                $("input[name='price[]']").each(function(index) {
                    var price = $("input[name='price[]'] ").eq(index).val();
                    var Dis = $("input[name='Discount[]'] ").eq(index).val();
                    var output = parseFloat(price) - parseFloat(Dis);
                    sum += output;
                    if (!isNaN(output)) {
                        $("input[name='total[]']").eq(index).val(output);

                    }
                    $("#alltotal").val(sum);
                });
            });
            $('#cusname').on('change', function() {

                var id = $(this).val();
                $.ajax({
                    url: "cutsomDetails/" + id,
                    method: "get",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {

                        $('#phnum').val(response.customer.phoneNumber);
                        $('#addr').val(response.customer.address);
                    }
                });
            });
            $('#cusname').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    url: "getinvoices/" + id,
                    method: "get",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        for (var i = 0; i < response.invoice.length; i++) {
                            $('#person').append("<option value=" + response.invoice[i].id +
                                ">" + response.invoice[i].id + "</option>");
                        }
                    }
                });
            });

        });
    </script>
@endsection
