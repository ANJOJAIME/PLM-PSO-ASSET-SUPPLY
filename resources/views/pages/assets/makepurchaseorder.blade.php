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
                right: 300px;
                width: 900px;
                height: 400px;
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
                width: 380px;
            }

            .input-group1 {
                position: absolute;
                right: 15px;
                top: 65px;
                display: flex;
                align-items: center;  
                justify-content: space-between;
                margin: 5px 0;
                width: 500px;
                gap: -5px;
                flex-direction: column;
            }

            .input-group label {
                flex-shrink: 0;
                width: 100px;
            }

            .input-group1 label {
                flex-shrink: 0;
                width: 105px;
            }

            .btn1-primary {
                position: fixed;
                top: 580px;
                left: 550px;
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
                left: 350px;
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
            <a href="{{url('purchase-order-view')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Make Purchase Order</strong></h1>
                            <form action="{{url('/storepurchaseorder/'.$asset->item_no)}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                @method ('PUT') 
                                <div class="input-group">
                                    <div class="input-group">
                                        <label for="item_no"><strong>Item No:</strong></label>
                                        <select name="item_no" id="item_no" style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                            <option value="">Select Item No.</option>
                                            @foreach($assets as $item)
                                                @if(!is_null($item->item_no))
                                                    <option value="{{ $item->item_no }}">{{ $item->item_no }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group">
                                        <label for="supplier"><strong>Supplier:</strong></label>
                                        <select name="supplier" style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                            <option value="">Select Supplier</option>
                                            @foreach($suppliers as $item)
                                                @if(!is_null($item->name))
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group">
                                        <label for="tin_no"><strong>TIN No.:</strong></label>
                                        <input type="text" name="tin_no" class="form-control @error('tin_no') is-invalid @enderror">
                                        @error('tin_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                        
                                    <div class="input-group">
                                        <label for="date"><strong>Date:</strong></label>
                                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="mode_of_proc"><strong>Mode of Procuremnt:</strong></label>
                                        <input type="text" name="mode_of_proc" class="form-control @error('mode_of_proc') is-invalid @enderror">
                                        @error('mode_of_proc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="place_dev"><strong>Place of Delivery:</strong></label>
                                        <input type="text" name="place_dev" class="form-control @error('place_dev') is-invalid @enderror">
                                        @error('place_dev')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-group1">
                                    <div class="input-group">
                                        <label for="date_dev"><strong>Date of Delivery:</strong></label>
                                        <input type="date" name="date_dev" class="form-control @error('date_dev') is-invalid @enderror">
                                        @error('date_dev')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="price_val"><strong>Price:</strong></label>
                                        <input type="number" name="price_val" class="form-control @error('price_val') is-invalid @enderror">
                                        @error('price_val')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="payment_term"><strong>Payment Term:</strong></label>
                                        <input type="text" name="payment_term" class="form-control @error('payment_term') is-invalid @enderror">
                                        @error('payment_term')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="quantity"><strong>Quantity:</strong></label>
                                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror">
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="unit"><strong>Unit:</strong></label>
                                        <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror">
                                        @error('unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="unit_cost"><strong>Unit Cost:</strong></label>
                                        <input type="number" name="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror">
                                        @error('unit_cost')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
            if (errorOccurred) {
                var stockNoField = document.querySelector('input[name="item_no"]');
                stockNoField.placeholder = "Error: Please enter a valid Item Number";
                stockNoField.style.color = "red";

                var descriptionField = document.querySelector('input[name="description"]');
                descriptionField.placeholder = "Error: Please enter a valid Description";
                descriptionField.style.color = "red";

                var poNoField = document.querySelector('input[name="po_no"]');
                poNoField.placeholder = "Error: Please enter a valid Purchase Order Number";
                poNoField.style.color = "red";

                var supplierField = document.querySelector('input[name="supplier"]');
                supplierField.placeholder = "Error: Please enter a valid Supplier";
                supplierField.style.color = "red";

                var addressField = document.querySelector('input[name="address"]');
                addressField.placeholder = "Error: Please enter a valid Address";
                addressField.style.color = "red";

                var telNoField = document.querySelector('input[name="tel_no"]');
                telNoField.placeholder = "Error: Please enter a valid Telephone Number";
                telNoField.style.color = "red";

                var tinNoField = document.querySelector('input[name="tin_no"]');
                tinNoField.placeholder = "Error: Please enter a valid TIN Number";
                tinNoField.style.color = "red";

                var dateField = document.querySelector('input[name="date"]');
                dateField.placeholder = "Error: Please enter a valid Date";
                dateField.style.color = "red";

                var modeOfProcField = document.querySelector('input[name="mode_of_proc"]');
                modeOfProcField.placeholder = "Error: Please enter a valid Mode of Procurement";
                modeOfProcField.style.color = "red";

                var prNoField = document.querySelector('input[name="pr_no"]');
                prNoField.placeholder = "Error: Please enter a valid PR Number";
                prNoField.style.color = "red";

                var placeDevField = document.querySelector('input[name="place_dev"]');
                placeDevField.placeholder = "Error: Please enter a valid Place of Delivery";
                placeDevField.style.color = "red";

                var dateDevField = document.querySelector('input[name="date_dev"]');
                dateDevField.placeholder = "Error: Please enter a valid Date of Delivery";
                dateDevField.style.color = "red";

                var priceValField = document.querySelector('input[name="price_val"]');
                priceValField.placeholder = "Error: Please enter a valid Price";
                priceValField.style.color = "red";

                var paymentTermField = document.querySelector('input[name="payment_term"]');
                paymentTermField.placeholder = "Error: Please enter a valid Payment Term";
                paymentTermField.style.color = "red";

                var quantityField = document.querySelector('input[name="quantity"]');
                quantityField.placeholder = "Error: Please enter a valid Quantity";
                quantityField.style.color = "red";

                var unitField = document.querySelector('input[name="unit"]');
                unitField.placeholder = "Error: Please enter a valid Unit";
                unitField.style.color = "red";

                var unitCostField = document.querySelector('input[name="unit_cost"]');
                unitCostField.placeholder = "Error: Please enter a valid Unit Cost";
                unitCostField.style.color = "red";

                var amountField = document.querySelector('input[name="amount"]');
                amountField.placeholder = "Error: Please enter a valid Amount";
                amountField.style.color = "red";
            }
        </script>
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
            document.getElementById('item_no').addEventListener('change', function() {
                var itemNo = this.value;

                fetch('/get-description/' + itemNo)
                    .then(response => response.text())
                    .then(description => {
                        document.getElementById('description').value = description;
                    });
            });
        </script>
    </body>
</html>