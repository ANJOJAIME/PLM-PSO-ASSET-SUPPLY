<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
        <title>PLM PSO | Delivered Supplies</title>

        <style>
            body {
                font-family: Arial;
                background-color: #4F74BB;
                margin: 0;
                padding: 20px;
                overflow: hidden;
            }

            .custom-header {
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
                    left: 22%;
                    top: 175px;
                    height: 70%;
                    width: 75%;
                    overflow-y: auto;
                    overflow-x: auto; /* Ensures horizontal scrolling */
                    scrollbar-width: thin; /* Adjust the width of the scrollbar */
                    scrollbar-color: #4F74BB #EFF0FF; /* Adjust the colors of the scrollbar */
                    border-radius: 15px;
                    background-color: white;
            }

.table-container table {
    border-collapse: collapse;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    table-layout: auto; /* Adjusts column width automatically */
}

.table-container th, .table-container td {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
    white-space: nowrap; /* Prevents text from wrapping */
}

.table-container td {
    border-collapse: separate;
    word-wrap: break-word; /* Ensures long words break to the next line */
}

.table-container th {
    position: sticky;
    top: 0; /* Ensures the header stays at the top while scrolling */
    background-color: #e6edfd;
    font-weight: bold;
    white-space: nowrap; /* Prevents text from wrapping */
    padding: 20px; /* Increased padding for table headers */
}

/* Custom scrollbar styles for WebKit browsers (Chrome, Safari) */



            .dropdown {
                position: absolute;
                top: 10px;
                left: 10px;
                z-index: 2;
            }
            .btn-outline-warning {
                width: 50px; /* Adjust as needed */
                height: 25px; /* Adjust as needed */
                font-size: 10px; /* Adjust as needed */
                text-align: center;
                padding: 5px;
            }
            .btn-outline-danger {
                width: 50px; /* Adjust as needed */
                height: 25px; /* Adjust as needed */
                font-size: 10px; /* Adjust as needed */
                text-align: center;
                padding: 5px;
            }
            .btn-primary {
                position: absolute;
                text-align: center;
                border:none;
                top: 100px;
                right: 50px;
                height: 40px;
                padding-top: 10px;
                border-radius: 4px;
                background: #EFF0FF;
                color: #000;
                font-size: 14px;
                font-style: normal;
                line-height: normal;
            }
            .custom-header {
                position: absolute;
                left: 0px; /* Adjust as needed */
                top: 0px;
                width: 100%;
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
                left: 0px; /* Adjust as needed */
                top: 45px;
                width: 18%;
                height: 100%;
                flex-shrink: 0;
                background: #2D349A;
                z-index: 1;
            }
            .btn-edit, .btn-delete{
                background-color: #EFF0FF; 
                color: #000;
                font-size: 14px;
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
            .text2 a, .items a{
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
                background: transparent;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb {
                background: #4F74BB;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #2D349A;
            }
            .label{
                position: absolute;
                color: white;
                font-size: 30px;
                z-index: 3; 
                top: 138px; 
                left: 300px;
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
            .notifdropdown {
                position: absolute;
                top: 10px;
                left: 85%;
                z-index: 2;
            }
            #notificationButton {
                position: absolute;
                top: 10px;
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
        </style>

    </head>
    <body>
        <h1 class="label"><strong>Supplies:Delivered</strong></h1>    
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div>
            <h4>
                <a href="{{url('/adddelivered')}}" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i><strong> ADD DELIVERED</strong></a>
            </h4>
        <div>
        <div class="search-bar" style="position: fixed; top: 80px; left: 300px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 35%; height: 40px; padding: 4.608px 0px 4.608px 9.217px; justify-content: space-between; align-items: center; flex-shrink: 0;">
            <form action="/searchdelivered" method="get" autocomplete="off">
                <div style="display: flex; align-items: center;">
                    <i class="fa fa-search" style="color: #4F74BB; margin-right: 5px;"></i>
                    <input type="text" style="border: none; background-color: transparent; width: 430px; outline: none;" name="item_description" placeholder="Search here by Item Description...">
                </div>
            </form>
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
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationButton">
                @foreach($notifications->reverse() as $notification)
                    <div class="dropdown-item">
                        <p>Timestamp: {{ $notification->created_at }}</p>
                        <p>Action: {{ $notification->type }}</p>
                        <p>Stock No.: {{ $notification->details }}</p>
                        <p>Item: {{ $notification->item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="side-bar" style="padding: 10px;">
            <h2 style="color: white; text-align: right; font-size: 20px; padding-top: 80px; padding-right: 10px"><strong>Supplies Management</strong></h2>
            <div class="items">
                <a class="main" href="/supplies-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Main</a>
                <a class="delivered" href="/delivered-supplies-view" style="color: #4F74BB; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivered</a>
                <a class="issued" href="/issued-supplies-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issued</a>
                <a class="department" href="/plm-departments" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">PLM Departments</a>
                <a class="reports&forms" href="supply-forms-and-reports-generation" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Reports and Forms</a>
                <a class="archives" href="{{ route('pages.delivered.archive') }}" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivered Archive</a>
                <a class="Issuedarchives" href="{{ route('pages.issued.archive') }}" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issued Archive</a>
            </div>
        </div>
        <div class="success-alert" style="position: fixed; top:350px; right:500px; z-index: 4;">
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
                            <th>Stock No.</th>
                            <th>Item No.</th>
                            <th>Item Description</th>
                            <th>Unit</th>
                            <th>Supplier</th>
                            <th>Actual Delivery Date</th>
                            <th>Quantity Delivered</th>
                            <th>IAR No.</th>
                            <th>DR No.</th>
                            <th>Check No.</th>
                            <th>PR No.</th>
                            <th>PO No.</th>
                            <th>PO Date</th>
                            <th>PO Amount</th>
                            <th>Price Per Purchase Request</th>
                            <th>BUR</th>
                            <th>Remarks</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delivered as $delivereddata)
                        <tr>
                            <td>{{$delivereddata->stock_no}}</td>
                            <td>{{$delivereddata->item_no}}</td>
                            <td>{{$delivereddata->item_description}}</td>
                            <td>{{$delivereddata->unit}}</td>
                            <td>{{$delivereddata->supplier}}</td>
                            <td>{{$delivereddata->actual_delivery_date}}</td>
                            <td>{{$delivereddata->delivered}}</td>
                            <td>{{$delivereddata->iar_no}}</td>
                            <td>{{$delivereddata->dr_no}}</td>
                            <td>{{$delivereddata->check_no}}</td>
                            <td>{{$delivereddata->pr_number}}</td>
                            <td>{{$delivereddata->po_no}}</td>
                            <td>{{$delivereddata->po_date}}</td>
                            <td>{{$delivereddata->po_amount}}</td>
                            <td>{{$delivereddata->price_per_purchase_request}}</td>
                            <td>{{$delivereddata->bur}}</td>
                            <td>{{$delivereddata->remarks}}</td>
                            <td>
                                @if($delivereddata->photo)
                                    <button type="button" data-toggle="modal" data-target="#photoModal{{ $delivereddata->id }}">
                                        View Photo
                                    </button>
                                    <div class="modal fade" id="photoModal{{ $delivereddata->id }}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{ $delivereddata->id }}" aria-hidden="true">
                                        <div class="modal-dialog d-flex align-items-center justify-content-center" role="document">
                                            <div class="modal-content mx-auto" style="background: transparent; border: none;">
                                                <div class="modal-body" style="background: transparent; display: flex; justify-content: center; align-items: center;">
                                                    <img src="{{ asset('images/' . $delivereddata->photo) }}" alt="Photo" class="img-fluid" style="max-width: 90%; max-height: 90vh;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('deletedelivered/'.$delivereddata->stock_no)}}" class="btn-delete" style="text-decoration: none;" onclick="return confirm('Are you sure you want to delete this data with Stock No. {{$delivereddata->stock_no}} in the delivered?')"><i class="bi bi-trash"></i>Delete</a>
                                <a href="{{ url('edit-delivered/'.$delivereddata->stock_no)}}" class="btn-edit" style="text-decoration: none;"><i class="bi bi-pencil-square"></i>Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </body>
</html>