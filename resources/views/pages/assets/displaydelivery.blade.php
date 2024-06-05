<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>PLM | Assets Delivery</title>
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


            .dropdown {
                position: absolute;
                top: 10px;
                left: 10px;
                z-index: 2;
            }
            .notifdropdown {
                position: absolute;
                top: 10px;
                left: 85%;
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
                width: 18%;
                height: 100%;
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
                padding-left: 30px; /* Adjust this value based on the size of your icon */
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
            .form-control {
                border-radius: none;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
        </style>
    </head>
    <body>
        <h1 class="label"><strong>Assets :Delivery</strong></h1>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div class="search-bar" style="position: fixed; top: 80px; left: 300px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 35%; height: 40px; padding: 4.608px 0px 4.608px 9.217px; justify-content: space-between; align-items: center; flex-shrink: 0;">
            <form action="/searchsupply" method="get">
                <input type="text" class="search" name="stock_no" placeholder="Search here..." autocomplete="off"> 
            </form>
        </div>
        <div class="side-bar" style="padding: 10px;">
            <h2 style="color: white; text-align: right; font-size: 20px; padding-top: 80px; padding-right: 10px"><strong>Assets Management</strong></h2>
            <div class="items">
                <a class="main" href="/asset-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Main</a>
                <a class="delivered" href="/delivery-view" style="color: #4F74BB; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivery</a>
                <a class="issuance" href="/issuance-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issuance</a>
                <a class="purchase_order" href="/purchase-order-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Purchase Order</a>
                <!-- <a class="assets_transer" href="/asset-transfer-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Asset Transfer</a> -->
                <a class="supplier" href="/suppliers-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Suppliers</a>
                <a class="department" href="/asset-plm-departments" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">PLM Departments</a>
                <a class="class" href="/class-category" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Class ID and Categories</a>
                <a class="reports&forms" href="asset-forms-and-reports-generation" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Reports and Forms</a>
                <a class="po_archive" href="/purchase-order/archive" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Purchase Order Archive</a>
                <a class="dArchive" href="/delivery/archive" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Delivery Archive</a>
                <a class="iArchive" href="/issuance/archive" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 10px; font-family: Arial">Issued Archive</a>
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
                            <th>Description</th>
                            <th>PO No.</th>
                            <th>Date of PO</th>
                            <th>PR No.</th>
                            <th>Supplier</th>
                            <th>Unit</th>
                            <th>IAR No.</th>
                            <th>BUR No.</th>
                            <th>Invoice No.</th>
                            <th>Date of Invoice</th>
                            <th>Date of Delivery</th>
                            <th>Place of Delivery</th>
                            <th>Classification ID</th>
                            <th>Category</th>
                            <th>Quantity Delivered</th>
                            <th>Unit Cost</th>
                            <th>Total Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        @foreach($dasset as $assetdata)
                        <tr>
                            <td>{{$assetdata->d_item_no}}</td>
                            <td>{{$assetdata->d_description}}</td>
                            <td>{{$assetdata->d_po_no}}</td>
                            <td>{{$assetdata->d_date_po}}</td>
                            <td>{{$assetdata->d_pr_no}}</td>
                            <td>{{$assetdata->d_supplier}}</td>
                            <td>{{$assetdata->d_unit}}</td>
                            <td>{{$assetdata->d_iar_no}}</td>
                            <td>{{$assetdata->d_bur_no}}</td>
                            <td>{{$assetdata->d_invoice_no}}</td>   
                            <td>{{$assetdata->d_date_invoice}}</td>
                            <td>{{$assetdata->d_date_of_delivery}}</td>
                            <td>{{$assetdata->d_place_of_delivery}}</td>
                            <td>{{$assetdata->d_class_id}}</td>
                            <td>{{$assetdata->d_category}}</td>
                            <td>{{$assetdata->d_qty}}</td>
                            <td>{{$assetdata->d_unit_cost}}</td>
                            <td>{{$assetdata->d_total_cost}}</td>
                            <td>
                                <button id="deliveryButton{{$assetdata->id}}" type="button" data-toggle="modal" data-target="#deliveryModal{{$assetdata->id}}">
                                    Issue
                                </button>
                                <a href="/deletedelivery/{{$assetdata->id}}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($dasset as $assetdata)
        <div class="modal fade" id="deliveryModal{{$assetdata->id}}" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deliveryModalLabel"><strong>Issue An Item</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('/istorenewissuance')}}" method="POST">
                        @csrf
                        @foreach($iasset as $asset)
                            @php
                                $issuedTotal = $issuedAssetTotals[$asset->i_description] ?? 0;
                                $deliveredTotal = $deliveredAssetTotals[$asset->i_description] ?? 0;
                                $balanceAfter = $deliveredTotal - $issuedTotal;
                            @endphp
                        @endforeach
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="i_description"><strong>Description</strong></label>
                                        <input type="text" class="form-control" name="i_description" value="{{$assetdata->d_description}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="i_par_no"><strong>PAR No</strong></label>
                                        <input type="text" class="form-control" name="i_par_no" id="i_par_no">
                                        <button id="generate-par-no" type="button">Generate PAR No</button>
                                </div>
                                <div class="form-group">
                                    <label for="i_property_no"><strong>Property No</strong></label>
                                        <input type="text" class="form-control" name="i_property_no" id="i_property_no">
                                    <div>
                                        <button id="generate-property-no" type="button">Generate Property No</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="i_unit"><strong>Unit</strong></label>
                                    <input type="text" class="form-control" name="i_unit" value="{{$assetdata->d_unit}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="i_req_office"><strong>Requesting Office</strong></label>
                                    <select name="i_req_office" class="form-control @error('i_req_office') is-invalid @enderror">
                                        <option value="">Select Requesting Office</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->department_name }}"
                                                {{ $asset->i_req_office ?? '' == $department->department_name ? 'selected' : '' }}>
                                                {{ $department->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="i_date_acquired"><strong>Date Acquired</strong></label>
                                    <input type="date" class="form-control" name="i_date_acquired">
                                </div>
                                <div class="form-group">
                                    <label for="i_location"><strong>Location</strong></label>
                                    <input type="text" class="form-control" name="i_location">
                                </div>
                                <div class="form-group">
                                    <label for="i_location_id"><strong>Location ID</strong></label>
                                    <input type="text" class="form-control" name="i_location_id">
                                </div>
                                <div class="form-group">
                                    <label for="i_site"><strong>Site</strong></label>
                                    <input type="text" class="form-control" name="i_site">
                                </div>
                                <div class="form-group">
                                    <label for="i_site_id"><strong>Site ID</strong></label>
                                    <input type="text" class="form-control" name="i_site_id">
                                </div>
                                <div class="form-group">                        
                                    <label for="i_quantity"><strong>Quantity </strong>(Available Stock: {{ $balanceAfter ?? $deliveredAssetTotals->sum() }})</label>
                                    <input type="number" class="form-control" name="i_quantity" id="i_quantity" oninput="checkQuantity()">
                                </div>
                                <div class="form-group">
                                    <label for="i_unit_value"><strong>Unit Cost</strong></label>
                                        <input type="text" class="form-control" name="i_unit_value" value="{{$assetdata->d_unit_cost}}" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="modalDeliveryButton{{$assetdata->id}}" type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
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
            document.getElementById('generate-par-no').addEventListener('click', function() {
                fetch('/generate-par-no')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('i_par_no').value = data.i_par_no;
                    });
            });
        </script>

        <script>
            document.getElementById('generate-property-no').addEventListener('click', function() {
                fetch('/generate-property-no')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('i_property_no').value = data.i_property_no;
                    });
            });
        </script>
        <script>
            function checkQuantity() {
                const quantityInput = document.getElementById('i_quantity');
                const availableStock = <?php echo $balanceAfter ?? $deliveredAssetTotals->sum(); ?>;
        
                if (quantityInput.value > availableStock) {
                    alert('The inputted quantity is higher than the available stock of ' + availableStock + '\nMake a Purchase Request to replenish the stock.');
                    quantityInput.value = availableStock;
                }
            }       
        </script>
    </body>
</html>