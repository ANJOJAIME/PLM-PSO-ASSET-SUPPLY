<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | ASSET: Add Delivery</title>
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
                right: 250px;
                width: 1000px;
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
                right: 0px;
                top: 40px;
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

            .input-group2 label {
                flex-shrink: 0;
                width: 90px;
            }

            .btn1-primary {
                position: fixed;
                top: 580px;
                left: 390px;
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
                left: 180px;
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
            <a href="{{url('delivery-view')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Add Asset Delivery</strong></h1>
                            <form action="{{url('/updatedelivery/'.$asset->item_no)}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                @method ('PUT') 
                            <div class="input-group">
                                <div class="input-group">
                                    <label for="item_no"><strong>Item No:</strong></label>
                                    <input type="text" name="item_no" value="{{ old('item_no', $asset->item_no) }}" readonly class="form-control" style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                </div>

                                <div class="input-group">
                                    <label for="description"><strong>Description:</strong></label>
                                    <input type="text" name="description" value="{{ $asset->description }}" class="form-control" readonly style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                </div>

                                <div class="input-group">
                                    <label for="iar_no"><strong>IAR No:</strong></label>
                                    <input type="text" id="iar_no" name="iar_no" value="{{ $asset->iar_no }}" class="form-control">
                                    <button id="generate-asset-iar-no" type="button">Generate IAR No</button>
                                </div>

                                <div class="input-group">
                                    <label for="supplier"><strong>Supplier:</strong></label>
                                    <input type="text" name="supplier" value="{{ $asset->supplier }}" class="form-control">
                                </div>

                                <div class="input-group">
                                    <label for="pr_no"><strong>PR No:</strong></label>
                                    <input type="text" name="pr_no" value="{{ $asset->pr_no }}" class="form-control" readonly style="width: 275px; height: 32px; background-color: rgba(209,223,255,255); border: 0.5px solid #000; border-radius: 2px; padding-left: 12px; color: rgba(86,93,103,255)">
                                </div>

                                <div class="input-group">
                                    <label for="bur_no"><strong>BUR No:</strong></label>
                                    <input type="text" name="bur_no" value="{{ $asset->bur_no }}" class="form-control">
                                </div>

                                <div class="input-group">
                                    <label for="po_no"><strong>PO No:</strong></label>
                                    <input type="text" name="po_no" value="{{ $asset->po_no }}" class="form-control">
                                </div>
                            </div>
                            <div class="input-group1">
                                <div class="input-group">
                                    <label for="date_po"><strong>Date of PO:</strong></label>
                                    <input type="date" name="date_po" value="{{ $asset->date_po }}" class="form-control @error('date') is-invalid @enderror">
                                </div>
                                <div class="input-group">
                                    <label for="invoice_no"><strong>Invoice No:</strong></label>
                                    <input type="text" name="invoice_no" value="{{ $asset->invoice_no }}" class="form-control">
                                </div>
                                <div class="input-group">
                                    <label for="date_invoice"><strong>Date of Invoice:</strong></label>
                                    <input type="date" name="date_invoice" value="{{ $asset->date_invoice }}" class="form-control @error('date') is-invalid @enderror">
                                </div>
                                <div class="input-group">
                                    <label for="req_office"><strong>Requesting Office:</strong></label>
                                    <select name="req_office" class="form-control @error('req_office') is-invalid @enderror">
                                            <option value="">{{ old('req_office', $asset->req_office ?? 'Select Office') }}</option>
                                            <option value="Accounting Office" {{ old('req_office', $asset->req_office ?? '') == 'Accounting Office' ? 'selected' : '' }}>Accounting Office</option>
                                            <option value="Budget Office" {{ old('req_office', $asset->req_office ?? '') == 'Budget Office' ? 'selected' : '' }}>Budget Office</option>
                                            <option value="Cash Office/Treasurer's Office" {{ old('requesting_office', $asset->requesting_office ?? '') == 'Cash Office/Treasurer\'s Office' ? 'selected' : '' }}>Cash Office/Treasurer's Office</option>
                                            <option value="Corporate Auditor" {{ old('req_office', $asset->req_office ?? '') == 'Corporate Auditor' ? 'selected' : '' }}>Corporate Auditor</option>
                                            <option value="Human Resource Devt. Office: Chief" {{ old('req_office', $asset->req_office ?? '') == 'Human Resource Devt. Office: Chief' ? 'selected' : '' }}>Human Resource Devt. Office: Chief</option>
                                            <option value="Internal Audit Office" {{ old('req_office', $asset->req_office ?? '') == 'Internal Audit Office' ? 'selected' : '' }}>Internal Audit Office</option>
                                            <option value="ICTO: Director & Asst. Vice President" {{ old('req_office', $asset->req_office ?? '') == 'ICTO: Director & Asst. Vice President' ? 'selected' : '' }}>ICTO: Director & Asst. Vice President</option>
                                            <option value="Library: Main" {{ old('req_office', $asset->req_office ?? '') == 'Library: Main' ? 'selected' : '' }}>Library: Main</option>
                                            <option value="Physical Facilities & Management Office: Chief" {{ old('req_office', $asset->req_office ?? '') == 'Physical Facilities & Management Office: Chief' ? 'selected' : '' }}>Physical Facilities & Management Office: Chief</option>
                                            <option value="OVPA: Admin Staff" {{ old('req_office', $asset->req_office ?? '') == 'OVPA: Admin Staff' ? 'selected' : '' }}>OVPA: Admin Staff</option>
                                            <option value="CA (Accountancy)" {{ old('req_office', $asset->req_office ?? '') == 'CA (Accountancy)' ? 'selected' : '' }}>CA (Accountancy)</option>
                                            <option value="CAUP (Architecture & Urban Planning)" {{ old('req_office', $asset->req_office ?? '') == 'CAUP (Architecture & Urban Planning)' ? 'selected' : '' }}>CAUP (Architecture & Urban Planning)</option>
                                            <option value="CBM (Business & Management): Main" {{ old('req_office', $asset->req_office ?? '') == 'CBM (Business & Management): Main' ? 'selected' : '' }}>CBM (Business & Management): Main</option>
                                            <option value="CET (Engineering & Technology)" {{ old('req_office', $asset->req_office ?? '') == 'CET (Engineering & Technology)' ? 'selected' : '' }}>CET (Engineering & Technology)</option>
                                            <option value="CET: Computer Laboratory" {{ old('req_office', $asset->req_office ?? '') == 'CET: Computer Laboratory' ? 'selected' : '' }}>CET: Computer Laboratory</option>
                                            <option value="CEd: Mabuhay Integrated Learning Center" {{ old('req_office', $asset->req_office ?? '') == 'CEd: Mabuhay Integrated Learning Center' ? 'selected' : '' }}>CEd: Mabuhay Integrated Learning Center</option>
                                            <option value="CHASS (Humanities & Social Sciences)" {{ old('req_office', $asset->req_office ?? '') == 'CHASS (Humanities & Social Sciences)' ? 'selected' : '' }}>CHASS (Humanities & Social Sciences)</option>
                                            <option value="CM: PLM-Ospital ng Maynila Medical Center" {{ old('req_office', $asset->req_office ?? '') == 'CM: PLM-Ospital ng Maynila Medical Center' ? 'selected' : '' }}>CM: PLM-Ospital ng Maynila Medical Center</option>
                                            <option value="CPT: Clinic" {{ old('req_office', $asset->req_office ?? '') == 'CPT: Clinic' ? 'selected' : '' }}>CPT: Clinic</option>
                                            <option value="CS: Science Laboratory" {{ old('req_office', $asset->req_office ?? '') == 'CS: Science Laboratory' ? 'selected' : '' }}>CS: Science Laboratory</option>
                                            <option value="OSDS: NSTP (DMST and CWTS)" {{ old('req_office', $asset->req_office ?? '') == 'OSDS: NSTP (DMST and CWTS)' ? 'selected' : '' }}>OSDS: NSTP (DMST and CWTS)</option>
                                            <option value="OVPAA: VP for Academic Affairs" {{ old('req_office', $asset->req_office ?? '') == 'OVPAA: VP for Academic Affairs' ? 'selected' : '' }}>OVPAA: VP for Academic Affairs</option>
                                            <option value="SSC Supreme Student Council" {{ old('req_office', $asset->req_office ?? '') == 'SSC Supreme Student Council' ? 'selected' : '' }}>SSC Supreme Student Council</option>
                                        </select>
                                </div>

                                <div class="input-group">
                                    <label for="unit"><strong>Unit:</strong></label>
                                    <input type="text" name="unit" value="{{ $asset->unit }}" class="form-control">
                                </div>

                                <div class="input-group">
                                    <label for="delivery_qty"><strong>Quantity:</strong></label>
                                    <input type="number" name="delivery_qty" value="{{ $asset->delivery_qty }}" class="form-control">
                                </div>

                                <div class="input-group">
                                    <label for="unit_cost"><strong>Unit Cost:</strong></label>
                                    <input type="number" name="unit_cost" value="{{ $asset->unit_cost }}" class="form-control">
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
                document.getElementById('generate-asset-iar-no').addEventListener('click', function() {
                    fetch('/generate-asset-iar-no')
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('iar_no').value = data.iar_no;
                        });
                });
        </script>
    </body>
</html>