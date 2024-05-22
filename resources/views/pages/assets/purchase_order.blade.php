<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>PLM | Purchase Order</title>
        <style>
            body {
                font-family: Arial;
                background-color: #4F74BB;
                margin: 0;
                padding: 20px;
                overflow: hidden;
            }

            .custom-header{
                position: absolute;
                left: 0;
                top: 0;
                width: calc(100% - 20px);
                height: 90px;
                flex-shrink: 0;
                background: #FFF;
                border-radius: 0px 0px 12px 12px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                justify-content: space-between;
                padding: 0 20px;
                z-index: 2;
            }
            .side-bar {
                position: absolute;
                left: 0;
                top: 85px;
                border-radius: 9.574px;
                background: #EFF0FF;
                
                width: 444px;
                height: 50px;
                
                justify-content: space-between;
                align-items: center;
                flex-shrink: 0;
            }

            .table-container {
                position: absolute;
                left: 300px;
                top: 180px;
                max-height: 500px;
                max-width: 1210px;
                overflow-y: auto;
                overflow-x: auto;
                border-radius: 15px;
                background-color: white;
            }

            .table-container table {
                border-collapse: collapse;
                width: 1200px;
                height: 550px;
                border-radius: 15px;
                overflow: auto;
                table-layout: fixed;
                
            }

            .table-container th, .table-container td {
                text-align: center;
                padding: 8px;
                border: 1px solid #ddd;
                width: 100px;
            }

            .table-container td{
                border-collapse: separate;
                word-wrap: break-word;
            }

            .table-container th {
                position: sticky;
                background-color: #e6edfd;
                font-weight: bold;
            }

            .table-container tbody tr:nth-child(odd) {
                background-color: white;
            }
            .table-container tbody tr:nth-child(even) {
                background-color: #f8f9fc;
            }
            .table-container tbody tr:hover {
                background-color: #dfe0e3;
            }

            .dropdown {
                position: absolute;
                top: 10px;
                left: 10px;
                z-index: 2;
            }
            .notifdropdown {
                position: absolute;
                top: 10px;
                left: 500px;
                z-index: 2;
            }
            .btn-outline-warning {
                width: 50px;
                height: 25px;
                font-size: 10px;
                text-align: center;
                padding: 5px;
            }
            .btn-outline-danger {
                width: 50px;
                height: 25px;
                font-size: 10px;
                text-align: center;
                padding: 5px;
            }
            .btn-primary {
                position: absolute;
                text-align: center;
                border:none;
                top: 100px;
                right: 220px;
                height: 40px;
                padding-top: 10px;
                border-radius: 4px;
                background: #EFF0FF;
                color: #000;
                font-size: 14px;
                font-style: normal;
                line-height: normal;
            }
            .btn-primary:hover {
                background-color: #2D349A;
                color: white;
            }
            .dropdown {
                left: 15px;
                top: 220px;
                z-index: 2;
            }
            .gendropdown {
                top: 100px;
                right: 35px;
                border-radius: 8px;
            }
            .custom-header {
                position: absolute;
                left: 0px;
                top: 0px;
                width: 1535px;
                height: 65px;
                flex-shrink: 0;
                background: #FFF;
                border-radius: 0px 0px 12px 12px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                justify-content: space-between;
                padding: 0 20px;
                z-index: 2;
            }
            img {
                position: absolute;
                width: 260px;
                height: 50px;
                left: 15px;
                top: 8px;
            }
            .side-bar{
                position: absolute;
                left: 0px;
                top: 45px;
                width: 260.877px;
                height: 1003px;
                flex-shrink: 0;
                background: #2D349A;
                z-index: 1;
            }
            .btn-edit, .btn-delete{
                background-color: #EFF0FF; 
                color: #000;
                font-size: 15px;
                padding: 5px 5px;
                border-radius: 8px;
                text-align: center;
            }
            .btn-edit:hover {
                background-color: green;
                color: white;
            }
            .btn-delete:hover {
                background-color: red;
                color: white;
            }
            .text2{
                position: absolute;
                top: 505px;
                right: 1263px;
                font-family: Arial;
                font-style: normal;
                font-size: 15px;
                line-height: 36px;
                z-index: 3;
            }
            .text2 a, .items a, .logout a{
                color: white;
                text-decoration: none;
            }
            .text2 a:hover{
                color: #4F74BB;
                text-decoration: none;
            }
            .items a:hover{
                color: #4F74BB !important;
                text-decoration: none;
            }
            ::-webkit-scrollbar {
                width: 10px;
                border-color: black;
            }

            ::-webkit-scrollbar-track {
                background: white;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb {
                background: #4F74BB;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #2D349A;
            }
            #profile {
                position: absolute;
                top: 20px;
                right: 30px;
                background-color: transparent;
                color: white;
                padding: 5px 5px;
                border: none;
                z-index: 3;
            }
            #profile::after {
                display: none;
            }
            #profile:focus {
                outline: none;
                box-shadow: none;
            }
            .fa-user::before {
                content: "\f007";
                color: #4F74BB;
                font-size: 20px;
            }
            .fa-user:hover::before {
                color: #2D349A;
                font-size: 25px;
            }
            #notificationButton {
                position: absolute;
                top: 10px;
                left: 940px;
                background-color: blue;
                color: white;
                padding: 5px 5px;
                border: none;
                z-index: 3;
            }
            #notificationButton::after {
                display: none;
            }
            #notificationButton:focus {
                outline: none;
                box-shadow: none;
            }
            .fa-bell::before {
                content: "\f0f3";
                color: #4F74BB;
                font-size: 20px;
            }
            .fa-bell:hover::before {
                color: #2D349A;
                font-size: 25px;
            }
            .dropdown-menu {
                overflow-y: auto;
                max-height: 300px;
                width: 400px;
            }
            #notificationBadge {
                top: -10px;
                right: 5px;
                height: 10px;
                width: 10px;
                background-color: red;
                border-radius: 50%;
                display: inline-block;
            }
            .search-input {
                position: relative;
            }

            .search-input i {
                position: absolute;
                left: 5px;
                top: 50%;
                transform: translateY(-50%);
            }
            .search-input input {
                padding-left: 30px;
                height: 40px;
                width: 420px;
                border: none;
                background: transparent;
            }
            .search-input input:focus {
                outline: none;
                border: none;
                background: transparent;
            }
            .search {
                border: none;
                height: 40px;
                width: 420px;
                background: transparent;
                font-family: Arial;
            }
            .search:focus {
                outline: none;
                border: none;
                background: transparent;
            }
            .label{
                position: absolute;
                color: white;
                font-size: 30px;
                z-index: 3; 
                top: 138px; 
                left: 300px;
            }
            .modal-content{
                position: fixed;
                top: 100px;
                right: 370px;
                width: 900px;
                height: 580px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .input-group label {
                flex-shrink: 0;
                width: 50px;
            }
            .form-control {
                border-radius: none;
                width: 250px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .form-group1 {
                position: absolute;
                top: 10px;
                left: 500px;
            }
            .m-label {
                
                width: 100px;
            }
            .modal-header {
                color: black;
                font-size: 20px;
                padding: 10px 20px;
                border-radius: 8px 8px 0px 0px;
            }
        </style>
    </head>
    <body>
        <h1 class="label"><strong>Assets:Purchase Order</strong></h1>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div class="search-bar" style="position: fixed; top: 80px; left: 300px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 444px; height: 40px; padding: 4.608px 0px 4.608px 9.217px; justify-content: space-between; align-items: center; flex-shrink: 0;">
            <form action="/searchsupply" method="get">
                <input type="text" class="search" name="stock_no" placeholder="Search here..." autocomplete="off"> 
            </form>
        </div>
        <div class="side-bar" style="padding: 10px;">
            <h2 style="color: white; text-align: right; font-size: 20px; padding-top: 80px; padding-right: 10px"><strong>Assets Management</strong></h2>
            <div class="items">
                <a class="main" href="/asset-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Main</a>
                <a class="delivered" href="/delivery-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivery</a>
                <a class="issuance" href="/issuance-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issuance</a>
                <a class="purchase_order" href="/purchase-order-view" style="color: #4F74BB; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Purchase Order</a>
                <a class="supplier" href="/suppliers-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Suppliers</a>
                <a class="department" href="" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">PLM Departments</a>
                <a class="reports&forms" href="asset-forms-and-reports-generation" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Reports and Forms</a>
                <a class="dArchive" href="" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivery Archive</a>
                <a class="iArchive" href="" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issued Archive</a>
            </div>
        </div>
        <div class="profile">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent">
                <i class="fa fa-user"></i>
                    <span id="profile" class="profile"></span>
                </i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile" style="width: 40px">
                <a href="/user-profile" class="logout" style="color: black; background-color: transparent; display: block; text-align: center; padding-right: 10px; font-family: Arial; text-decoration: none">Profile</a>
                <a href="/mainpage" class="logout" style="color: black; background-color: transparent; display: block; text-align: center; padding-right: 10px; font-family: Arial; text-decoration: none">Logout</a>
            </div>
        </div>
        <div class="notifdropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent">
                <i class="fa fa-bell">
                    <span id="notificationBadge" class="badge badge-danger"></span>
                </i>
            </button>
        </div>
        <div>
            <h4>
                <a href="{{url('/makepurchaseorder')}}" class="btn btn-primary"><strong>Make Purchase Order</strong></a>
            </h4>
        <div>

        <div class="success-alert" style="position: fixed; top:350px; right:600px; z-index: 4;">
            @if(session('status'))
                <div id="alert" class="alert alert-success">{{session('status')}}</div>
                <script>
                    setTimeout(function() {
                        document.getElementById('alert').style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
        <div class="container">
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                            <th>Item No.</th> 
                            <th>Item Description</th>
                            <th>Unit</th>
                            <th>Purchase Order No.</th>
                            <th>Supplier</th>
                            <th>TIN No.</th>
                            <th>Date Purchase Order Created</th>
                            <th>Mode of Procurement</th>
                            <th>PR No.</th>
                            <th>Place of Delivery</th>
                            <th>Date of Delivery</th>
                            <th>Price/Value</th>
                            <th>Payment Term</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->item_no}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->unit}}</td>
                            <td>{{$order->po_no}}</td>
                            <td>{{$order->supplier}}</td>
                            <td>{{$order->tin_no}}</td>
                            <td>{{$order->updated_at}}</td>
                            <td>{{$order->mode_of_proc}}</td>
                            <td>{{$order->pr_no}}</td>
                            <td>{{$order->place_dev}}</td>
                            <td>{{$order->date_dev}}</td>
                            <td>{{$order->price_val}}</td>
                            <td>{{$order->payment_term}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->unit_cost}}</td>
                            <td>{{ $order->quantity * $order->unit_cost }}</td>
                            <td> 
                                <button id="deliveryButton{{$order->id}}" type="button" data-toggle="modal" data-target="#deliveryModal{{$order->id}}">
                                    Deliver
                                </button>
                                <a href="{{url('/delete-purchase-order/'.$order->id)}}" class="btn btn-delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="deliveryModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deliveryModalLabel"><strong>Confirm Delivery</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('/storenewdelivery')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="d_item_no" class="col-sm-2 col-form-label m-label"><strong>Item Number</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_item_no" value="{{$order->item_no}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_description" class="col-sm-2 col-form-label m-label"><strong>Description</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_description" value="{{$order->description}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_po_no" class="col-sm-2 col-form-label m-label"><strong>PO No</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_po_no" value="{{$order->po_no}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_date_po" class="col-sm-2 col-form-label m-label"><strong>Date of PO:</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_date_po" value="{{$order->updated_at}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_pr_no" class="col-sm-2 col-form-label m-label"><strong>PR No</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_pr_no" value="{{$order->pr_no}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_supplier" class="col-sm-2 col-form-label m-label"><strong>Supplier</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_supplier" value="{{$order->supplier}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_unit" class="col-sm-2 col-form-label m-label"><strong>Unit</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_unit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_iar_no" class="col-sm-2 col-form-label m-label"><strong>IAR No</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_iar_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-group1">
                            <div class="form-group row">
                                <label for="d_bur_no" class="col-sm-2 col-form-label m-label"><strong>BUR No</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_bur_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_invoice_no" class="col-sm-2 col-form-label m-label"><strong>Invoice No</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_invoice_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_date_invoice" class="col-sm-2 col-form-label m-label"><strong>Date of Invoice</strong></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="d_date_invoice">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_qty" class="col-sm-2 col-form-label m-label"><strong>Quantity</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_qty" value="{{$order->quantity}}" readonly>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirmCheck" required>
                                        <label class="form-check-label" for="confirmCheck">
                                            <i>Confirmed if delivered items are correct<i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_unit_cost" class="col-sm-2 col-form-label m-label"><strong>Unit Cost</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_unit_cost" value="{{$order->unit_cost}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="d_total_cost" class="col-sm-2 col-form-label m-label"><strong>Total Cost</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_total_cost" value="{{$order->quantity * $order->unit_cost}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="modalDeliveryButton{{$order->id}}" type="submit" class="btn btn-success">
                                Save
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
            $("input[type='submit']").hover(function(){
                $(this).css("background-color", "#0069d9");
                $(this).css("color", "white"); // Change font color to white
                }, function(){
                $(this).css("background-color", "");
                $(this).css("color", ""); // Reset font color
            });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".gendropdown .dropdown-item").hover(function(){
                    $(this).css("background-color", "#0069d9");
                    $(this).css("color", "white");
                    }, function(){
                    $(this).css("background-color", "#e6edfd");
                    $(this).css("color", "black");
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".dropdown .dropdown-item").hover(function(){
                    $(this).css("background-color", "white");
                    $(this).css("color", "#2D349A");
                    }, function(){
                    $(this).css("background-color", "transparent");
                    $(this).css("color", "white");
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#dropdownMenuButton1").hover(function(){
                    $(this).css("background-color", "#2D349A");
                    $(this).css("color", "white");
                    }, function(){
                    $(this).css("background-color", "#e6edfd");
                    $(this).css("color", "black");
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#notificationButton").click(function(){
                    $("#notificationDropdown").toggle();
                    hideNotificationBadge();
                });
            });
        </script>
        <script>
            // Hide the notification badge when a notification is viewed
            function hideNotificationBadge() {
                var badge = document.querySelector('#notificationBadge');
                if (badge) {
                    badge.style.display = 'none';
                }
            }
        </script>
        <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                if (!$('#confirmCheck').is(':checked')) {
                    e.preventDefault();
                    alert('Please confirm before submitting the form.');
                }
            });
        });
        </script>
    </body>
</html>