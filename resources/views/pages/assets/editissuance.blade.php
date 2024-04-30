<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | ASSET: Purchase Order</title>
        <style>
            body {
                font-family: Arial;
                background-color: #2D349A;
                margin: 0;
                padding: 20px;
                overflow: hidden;
            }
            img {
                position: absolute;
                width: 280px;
                height: 60px;
                left: 15px;
                top: 8px;
            }
            .custom-header {
                position: absolute;
                left: 0px; /* Adjust as needed */
                top: 0px;
                width: 1535px;
                height: 75px;
                flex-shrink: 0;
                background: #FFF;
                border-radius: 0px 0px 12px 12px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                justify-content: space-between;
                padding: 0 20px;
                z-index: 2;
            }

            .form-control {
                border-radius: none;
                width: 700px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .card-body{
                position: fixed;
                top: 150px;
                right: 370px;
                width: 750px;
                height: 410px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .input-group {
                right: 0px;
                top: 5px;
                display: flex;
                align-items: center;
                gap: 2px;
                justify-content: space-between;
                margin: 5px 0;
                width: 600px;
            }

            .input-group label {
                flex-shrink: 0;
                width: 100px;
            }

            .btn1-primary {
                position: fixed;
                top: 580px;
                left: 620px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 194px;
                height: 38px;
                flex-shrink: 0;
            }
            .btn1-primary:hover{
                background-color: red;
                color: white;
                border: none;
            }

            .btn-primary{
                position: fixed;
                top: 580px;
                left: 415px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 194px;
                height: 38px;
                flex-shrink: 0;
                color: black;
            }
        </style>
    </head>
    <body>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div class ="card-header">
            <a href="{{url('issuance-view')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Edit Issuance</strong></h1>
                            <form action="{{url('/updateissuance/'.$asset->item_no)}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                @method ('PUT') 
                                <div class="input-group">
                                    <div class="input-group">
                                        <label for="par_no"><strong>PAR No:</strong></label>
                                        <input type="text" id="par_no" name="par_no" value="{{ old('par_no', $asset->par_no) }}" class="form-control" >
                                        <button id="generate-par-no" type="button">Generate PAR No</button>
                                    </div>
                                    <div class="input-group">
                                        <label for="description"><strong>Item Description:</strong></label>
                                        <input type="text" name="description" value="{{ old('description', $asset->description) }}" class="form-control" >
                                    </div>
                                    <div class="input-group">
                                        <label for="date_acquired"><strong>Date Acquired:</strong></label>
                                        <input type="date" name="date_acquired" value="{{ old('date_acquired', $asset->date_acquired) }}" class="form-control" >
                                    </div>
                                    <div class="input-group">
                                    <label for="property_no"><strong>Property No:</strong></label>
                                        <input type="text" id="property_no" name="property_no" value="{{ old('property_no', $asset->property_no) }}" class="form-control" >
                                        <button id="generate-property-no" type="button">Generate Property No</button>
                                    </div>
                                    <div class="input-group">
                                        <label for="unit"><strong>Unit:</strong></label>
                                        <input type="text" name="unit" value="{{ old('unit', $asset->unit) }}" class="form-control" >
                                    </div>
                                    <div class="input-group">
                                        <label for="issue_qty"><strong>Quantity Issued:</strong></label>
                                        <input type="number" name="issue_qty" value="{{ old('issue_qty', $asset->issue_qty) }}" class="form-control" >
                                    </div>
                                    
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                var item_no = document.querySelector('input[name="item_no"]').value;
                var description = document.querySelector('input[name="description"]').value;
                var po_no = document.querySelector('input[name="po_no"]').value;
                var supplier = document.querySelector('input[name="supplier"]').value;
                var address = document.querySelector('input[name="address"]').value;
                var tel_no = document.querySelector('input[name="tel_no"]').value;
                var tin_no = document.querySelector('input[name="tin_no"]').value;
                var date = document.querySelector('input[name="date"]').value;
                var mode_of_proc = document.querySelector('input[name="mode_of_proc"]').value;
                var pr_no = document.querySelector('input[name="pr_no"]').value;
                var place_dev = document.querySelector('input[name="place_dev"]').value;
                var date_dev = document.querySelector('input[name="date_dev"]').value;
                var price_val = document.querySelector('input[name="price_val"]').value;
                var payment_term = document.querySelector('input[name="payment_term"]').value;
                var quantity = document.querySelector('input[name="quantity"]').value;
                var unit = document.querySelector('input[name="unit"]').value;
                var unit_cost = document.querySelector('input[name="unit_cost"]').value;
                var amount = document.querySelector('input[name="amount"]').value;

                var message = 'Are you sure you want to EDIT this item:\n' +
                    'Item No: ' + item_no + '\n' +
                    'Description: ' + description + '\n' +
                    'Purchase Order No.: ' + po_no + '\n' +
                    'Supplier: ' + supplier + '\n' +
                    'Address: ' + address + '\n' +
                    'Tel No.: ' + tel_no + '\n' +
                    'TIN No.: ' + tin_no + '\n' +
                    'Date: ' + date + '\n' +
                    'Mode of Procurement: ' + mode_of_proc + '\n' +
                    'PR No.: ' + pr_no + '\n' +
                    'Place of Delivery: ' + place_dev + '\n' +
                    'Date of Delivery: ' + date_dev + '\n' +
                    'Price: ' + price_val + '\n' +
                    'Payment Term: ' + payment_term + '\n' +
                    'Quantity: ' + quantity + '\n' +
                    'Unit: ' + unit + '\n' +
                    'Unit Cost: ' + unit_cost + '\n' +
                    'Amount: ' + amount + '\n' +
                    "\nif not select 'cancel'";

                if (!confirm(message)) {
                    event.preventDefault();
                }
            });
        </script>
        <script>
            document.getElementById('generate-property-no').addEventListener('click', function() {
                fetch('/generate-property-no')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('property_no').value = data.property_no;
                    });
            });
        </script>
        <script>
            document.getElementById('generate-par-no').addEventListener('click', function() {
                fetch('/generate-par-no')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('par_no').value = data.par_no;
                    });
            });
        </script>
    </body>
</html>