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

            .form-control {
                border-radius: none;
                width: 700px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .card-body{
                position: fixed;
                top: 120px;
                right: 300px;
                width: 900px;
                height: 500px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .input-group {
                right: -10px;
                top: 5px;
                display: flex;
                align-items: center;
                gap: 0px;
                justify-content: space-between;
                margin: 5px 0;
                width: 380px;
            }

            .input-group1 {
                position: absolute;
                right: -20px;
                top: 65px;
                display: flex;
                align-items: center;  
                justify-content: space-between;
                margin: 5px 0;
                width: 500px;
                gap: 0px;
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
                top: 640px;
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
                top: 640px;
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
                            <form action="{{url('/storepurchaseorder')}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                <div class="input-group">
                                    <div class="input-group">
                                        <label for="item_no"><strong>Item No:</strong></label>
                                        <select name="item_no" id="item_no_select" style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)"  class="form-control @error('item_no') is-invalid @enderror">
                                            <option value="">Select Item No.</option>
                                            @foreach($orders as $order)
                                                @if(!is_null($order->item_no))
                                                    <option value="{{ $order->item_no }}">{{ $order->item_no }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="input-group"style="width: 275px; height: 32px; left: 105px;">
                                            <input type="text" id="item_no" name="item_no" class="form-control @error('item_no') is-invalid @enderror">
                                            <button id="generate-item-no" type="button">Generate Item No</button>
                                            @error('item_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label for="description"><strong>Description:</strong></label>
                                        <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror">
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="unit"><strong>Unit:</strong></label>
                                        <input type="text" id="unit" name="unit" class="form-control @error('unit') is-invalid @enderror">
                                        @error('unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="supplier"><strong>Supplier:</strong></label>
                                        <select id="supplier" name="supplier" style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                            <option value="">Select Supplier</option>
                                            @foreach($suppliers as $item)
                                                @if(!is_null($item->name))
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="po_no"><strong>Purchase Order No.:</strong></label>
                                        <input type="text" name="po_no" class="form-control @error('po_no') is-invalid @enderror">
                                        @error('po_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="pr_no"><strong>Purchase Request No.:</strong></label>
                                        <input type="text" name="pr_no" class="form-control @error('pr_no') is-invalid @enderror">
                                        @error('pr_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="tin_no"><strong>TIN No.:</strong></label>
                                        <input type="text" name="tin_no" class="form-control @error('tin_no') is-invalid @enderror">
                                        @error('tin_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-group1">
                                    <div class="input-group">
                                        <label for="mode_of_proc"><strong>Mode of Procuremnt:</strong></label>
                                        <input type="text" id="mode_of_proc" name="mode_of_proc" class="form-control @error('mode_of_proc') is-invalid @enderror">
                                        @error('mode_of_proc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="price_val"><strong>Price Value:</strong></label>
                                        <input type="text" id="price_val" name="price_val" class="form-control @error('price_val') is-invalid @enderror">
                                        @error('price_val')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="payment_term"><strong>Payment Term:</strong></label>
                                        <input type="text" id="payment_term" name="payment_term" class="form-control @error('payment_term') is-invalid @enderror">
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
                                        <label for="unit_cost"><strong>Unit Cost:</strong></label>
                                        <input type="number" id="unit_cost" name="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror">
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
        
        <!--Disabling the fields of Item No-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const select = document.querySelector('#item_no_select');
                const input = document.querySelector('#item_no');
                const button = document.querySelector('#generate-item-no');
        
                select.addEventListener('change', function() {
                    if (this.value !== "") {
                        input.disabled = true;
                    } else {
                        input.disabled = false;
                    }
                });
        
                input.addEventListener('input', function() {
                    if (this.value !== "") {
                        select.disabled = true;
                    } else {
                        select.disabled = false;
                    }
                });
        
                button.addEventListener('click', function() {
                    if (input.value !== "") {
                        select.disabled = true;
                    } else {
                        select.disabled = false;
                    }
                    if (select.value !== "") {
                        input.disabled = true;
                    } else {
                        input.disabled = false;
                    }
                });
            });
        </script>
        <!--Fetching the description of the Item No-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const item_no_select = document.getElementById('item_no_select');
                const item_no_input = document.getElementById('item_no');
                const description = document.getElementById('description');
                const unit = document.getElementById('unit');
                const supplier = document.getElementById('supplier');
                const mode_of_proc = document.getElementById('mode_of_proc');
                const price_val = document.getElementById('price_val');
                const payment_term = document.getElementById('payment_term');
                const unit_cost = document.getElementById('unit_cost');

                function setFields() {
                    // Get the item_no value from either the select dropdown or the input field
                    const itemNo = item_no_select.value ? item_no_select.value : item_no_input.value;

                    fetch('/get-description/' + itemNo)
                        .then(response => response.json())
                        .then(data => {
                            if (data.orders) {
                                description.value = data.orders.description || '';
                                unit.value = data.orders.unit || '';
                                supplier.value = data.orders.supplier || '';
                                mode_of_proc.value = data.orders.mode_of_proc || '';
                                price_val.value = data.orders.price_val || '';
                                payment_term.value = data.orders.payment_term || '';
                                unit_cost.value = data.orders.unit_cost || '';
                            } else {
                                console.log('Data not found in response', data);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }

                // Set the fields when the page loads
                setFields();

                // Update the fields when the selected item changes
                item_no_select.addEventListener('change', setFields);
                item_no_input.addEventListener('input', setFields);
            });
        </script>
        <script>
                document.getElementById('generate-item-no').addEventListener('click', function() {
                    fetch('/generate-item-no')
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('item_no').value = data.item_no;
                        });
                });
        </script>
    </body>
</html>