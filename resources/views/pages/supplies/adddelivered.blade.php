<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM PSO | SUPPLIES: Delivery</title>
        
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
                border-radius: 0.5px;
                width: 1084px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .card-body{
                position: fixed;
                top: 13%;
                left: 5%;
                right: 150px;
                width: 1250px;
                height: 520px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .container {
                position: relative;
            }
            .input-group {
                left: 25px;
                top: 5px;
                display: flex;
                align-items: center;
                gap: 2px;
                justify-content: space-between;
                margin: 5px 0;
                width: 500px;
            }
            .input-group1 {
                position: absolute;
                right: 100px;
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
                width: 150px; /* adjust as needed */
            }
            
            

            .btn1-primary {
                position: fixed;
                top: 610px;
                left: 340px;
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
                top: 610px;
                left: 135px;
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
        <div>
            <a href="{{url('delivered-supplies-view')}}" class="btn btn1-primary">Cancel</a>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-body">
                        <h1><strong>ADD DELIVERED</strong></h1>
                        <form action="{{url('/storenewdelivered')}}" class="form-body" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                    <div class="input-group">
                                        <label for="stock_type"><strong>Stock Type:</strong></label>
                                        <select name="stock_type" id="stock_type" class="form-control @error('stock_type') is-invalid @enderror">
                                            <option value="">Select Stock Type</option>
                                            <option value="CS">CS</option>
                                            <option value="GOS">GOS</option>
                                            <option value="MIS">MIS</option>
                                            <option value="MIM">MIM</option>
                                            <option value="OUR">OUR</option>
                                            <option value="IBM">IBM</option>
                                        </select>
                                        @error('stock_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="stock_no"><strong>Stock No.:</strong></label>
                                        <input type="text" id="stock_no" name="stock_no" class="form-control @error('stock_no') is-invalid @enderror" >
                                        <button id="generate-stock-no" type="button">Generate Stock No</button>
                                        @error('stock_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="item_description"><strong>Item Description:</strong></label>
                                        <select name="item_description" id="description_select" class="form-control @error('item_description') is-invalid @enderror">
                                            <option value="">Select Item Description</option>
                                            @foreach($delivered as $item)
                                                <option value="{{ $item->item_description }}" data-unit="{{ $item->unit }}">{{ $item->item_description }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="item_description" name="item_description" class="form-control @error('item_description') is-invalid @enderror">
                                        @error('item_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="supplier"><strong>Supplier:</strong></label>
                                        <select id="supplier" name="supplier" style="width: 347px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                            <option value="">Select Supplier</option>
                                            @foreach($suppliers as $item)
                                                @if(!is_null($item->name))
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="actual_delivery_date"><strong>Delivery Date:</strong></label>
                                        <input type="date" name="actual_delivery_date" class="form-control @error('actual_delivery_date') is-invalid @enderror">
                                        @error('actual_delivery_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="delivered"><strong>Quantity Delivered:</strong></label>
                                        <input type="number" name="delivered" class="form-control @error('delivered') is-invalid @enderror">
                                        @error('delivered')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                    <div class="input-group">
                                        <label for="iar_no"><strong>IAR No.:</strong></label>
                                        <input type="text" id="iar_no"  name='iar_no' class="form-control @error('iar_no') is-invalid @enderror">
                                        <button id="generate-iar-no" type="button">Generate IAR No</button>
                                        @error('iar_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="item_no"><strong>Item No.:</strong></label>
                                        <input type="text" id="item_no" name='item_no' class="form-control @error('item_no') is-invalid @enderror">
                                        <button id="generate-item-no" type="button">Generate Item No</button>
                                        @error('item_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="dr_no"><strong>DR No.:</strong></label>
                                        <input type="text" name="dr_no" class="form-control @error('dr_no') is-invalid @enderror">
                                        @error('dr_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="unit"><strong>Unit:</strong></label>
                                        <input type="text" name="unit" style="width: 345px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                    </div>
                                </div>
                                <div class="input-group1">
                                    <div class="input-group">
                                        <label for="check_no"><strong>Check No.:</strong></label>
                                        <input type="text" name="check_no" class="form-control @error('check_no') is-invalid @enderror">
                                        @error('check_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="po_no"><strong>PO No.:</strong></label>
                                        <input type="text" name="po_no" class="form-control @error('po_no') is-invalid @enderror">
                                        @error('po_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                    <label for="po_date"><strong>PO Date:</strong></label>
                                        <input type="date" name="po_date" class="form-control @error('po_date') is-invalid @enderror">
                                        @error('po_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group"> 
                                        <label for="po_amount"><strong>PO Amount:</strong></label>
                                        <input type="number" name="po_amount" class="form-control @error('po_amount') is-invalid @enderror">
                                        @error('po_amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group"> 
                                        <label for="pr_number"><strong>PR No.:</strong></label>
                                        <input type="text" id="pr_number" name="pr_number" class="form-control @error('pr_number') is-invalid @enderror">
                                        @error('pr_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="input-group"> 
                                        <label for="price_per_purchase_request"><strong>Price Per Purchase Request:</strong></label>
                                        <input type="number" name="price_per_purchase_request" class="form-control @error('price_per_purchase_request') is-invalid @enderror">
                                        @error('price_per_purchase_request')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group"> 
                                        <label for="bur"><strong>BUR:</strong></label>
                                        <input type="text" name="bur" class="form-control @error('bur') is-invalid @enderror">
                                        @error('bur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group"> 
                                        <label for="remarks"><strong>Remark:</strong></label>
                                        <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror">
                                        @error('remarks')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="photo"><strong>Photo:</strong></label>
                                        <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" style="height: 45px">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $(".btn1-primary").hover(function(){
                    $(this).css("background-color", "blue");
                    $(this).css("color", "white");
                    }, function(){
                    $(this).css("background-color", "");
                    $(this).css("color", "");
                });
            });
        </script>

        <script>
            document.getElementById('generate-stock-no').addEventListener('click', function() {
                // Get the selected stock type
                var stockType = document.getElementById('stock_type').value;
        
                fetch('/generate-stock-no?stock_type=' + encodeURIComponent(stockType))
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('stock_no').value = data.stock_no;
                    });
            });
        </script>
        <script>
            document.getElementById('generate-iar-no').addEventListener('click', function() {
                fetch('/generate-iar-no')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('iar_no').value = data.iar_no;
                    });
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
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const select = document.querySelector('#description_select');
                const input = document.querySelector('#item_description');

                select.addEventListener('change', function() {
                    // If the select is not on default, disable input
                    if (this.value !== "") {
                        input.disabled = true;
                    } else {
                        input.disabled = false;
                    }
                });
            });
            </script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const descriptionSelect = document.getElementById('description_select');
                const unitInput = document.querySelector('input[name="unit"]');

                descriptionSelect.addEventListener('change', function() {
                    // Get the selected option
                    const selectedOption = this.options[this.selectedIndex];
                    // Set the unit input's value based on the data-unit attribute
                    unitInput.value = selectedOption.dataset.unit || ''; // Clears the field if no unit is set
                });
            });
            </script>
    </body>
</html>