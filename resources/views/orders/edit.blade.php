@extends('adminlte::page')

@section('title', 'Edit Order')

@section('content_header')
    <h1>Edit Order <span id="order_id" data-id="{{ $order->id }}">{{ $order->order_nbr }}</span></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" id="food-search" class="form-control" placeholder="Search Food">
            </div>
            <div style="max-height: 500px; overflow-y: scroll">
                @foreach ($foods as $food)
                <div class="info-box shadow-sm">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span><!-- /TODO Display Food Image -->

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $food->name }}</span>
                        <span class="info-box-number">{{ \Helper::moneyFormat($food->price) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                    <a class="info-box-icon btn btn-outline-success add-food" data-food_id="{{ $food->id }}"><i class="fas fa-plus"></i></a>
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered" id="table-food-order">
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Total Price</th>
                    <th>Jumlah</th>
                </tr>
            </table>
            @if($order->status == 'open')
            <form action="{{ route('order-close', $order) }}" method="POST">
                @csrf

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Close Order</button>
                </div>
            </form>
            @else
                <div class="form-group">
                    <a href="#" type="submit" class="btn btn-block btn-primary disabled">Order Sudah Selesai</a>
                </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        .order-qty-action i{
            font-size: 25px
        }
        .order-qty-action input{
            margin: 0 15px;
            width: 60px;
        }
    </style>
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script>
        $(document).ready(function(){
            var orderId = $('#order_id').data('id');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': csrf_token }
            });
            var orderData = {!! json_encode($order) !!};

            var editOrder = {
                init: function(){
                    editOrder.addFoodButton();
                   if (orderData.food_orders) {
                        editOrder.orderDataToTable(orderData.food_orders);
                        editOrder.orderTotalTable(orderData.food_orders);
                   }
                },
                addFoodButton: function(){
                    $('.add-food').on('click', function(){
                        var foodId = $(this).data('food_id');

                        $.post('/order-add-food', {
                            'order_id' : orderId,
                            'food_id' : foodId,
                        }).then( function (response){
                            var data = response;
                            var food_orders = response.food_orders;
                            editOrder.orderDataToTable(food_orders);
                        });
                    })
                },
                orderQtyChange: function() {
                    $('.qty').on('change', function() {
                        var qty = $(this).val();
                        var foodId = $(this).data('food_id');

                        $.post('/order-add-food', {
                            'order_id' : orderId,
                            'food_id' : foodId,
                            'qty' : qty
                        }).then( function (response){
                            var data = response;
                            var food_orders = response.food_orders;
                            editOrder.orderDataToTable(food_orders);
                        });
                    })
                },
                orderDelete: function() {
                    $('.delete-food-order').on('click', function() {
                        var foodId = $(this).data('food_id');

                        $.post('/order-delete-food', {
                            'order_id' : orderId,
                            'food_id' : foodId,
                        }).then( function (response){
                            var data = response;
                            var food_orders = response.food_orders;
                            editOrder.orderDataToTable(food_orders);
                        });
                    })
                },
                orderDataToTable: function(data) {
                    let foodOrder;
                    $('.food-item').remove();
                    for (let index = 0; index < data.length; index++) {
                        foodOrder = data[index];
                        let tr = $('<tr class="food-item"></tr>');
                        let number = $('<td></td>').text(index+1);
                        let name = $('<td></td>').text(foodOrder.food.name);
                        let price = $('<td></td>').text(foodOrder.total_price);
                        let jumlah = $('<td class="order-qty-action d-flex justify-content-center"></td>');
                        let input = $('<input type="number" name="qty" class="qty" data-food_id="'+foodOrder.food_id+'" min="1" value="'+foodOrder.qty+'">');
                        let deleteBtn = $('<i class="fas fa-times text-danger delete-food-order" data-food_id="'+foodOrder.food_id+'"></i>');
                        jumlah.append(input).append(deleteBtn);

                        $(tr).append(number)
                            .append(name)
                            .append(price)
                            .append(jumlah)

                        $('#table-food-order').append(tr);
                    }


                    editOrder.orderQtyChange();
                    // editOrder.addFoodButton();
                    editOrder.orderDelete();
                },
                orderTotalTable: function(data) {

                }
            }

            editOrder.init();
        })
    </script>
@stop
