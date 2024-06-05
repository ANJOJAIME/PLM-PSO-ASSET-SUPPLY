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
                width: 300px;
                height: 30px;
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
                gap: 0px;
                justify-content: space-between;
                margin: 0px 0;
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
                            <form action="{{url('/storenewdelivery')}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                @method ('PUT') 
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="d_item_no"><strong>Item Number</strong></label>
                                        <div>
                                            <input type="text" class="form-control" name="d_item_no">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="d_description"><strong>Description</strong></label>
                                            <input type="text" class="form-control" name="d_description">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_po_no"><strong>PO No</strong></label>
                                            <input type="text" class="form-control" name="d_po_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_date_po"><strong>Date of PO:</strong></label>
                                            <input type="text" class="form-control" name="d_date_po">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_pr_no"><strong>PR No</strong></label>
                                            <input type="text" class="form-control" name="d_pr_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_supplier"><strong>Supplier</strong></label>
                                            <input type="text" class="form-control" name="d_supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_unit"><strong>Unit</strong></label>
                                            <input type="text" class="form-control" name="d_unit">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_date_of_delivery"><strong>Delivery Date</strong></label>
                                            <input type="date" class="form-control" name="d_date_of_delivery">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_place_of_delivery"><strong>Place of Delivery</strong></label>
                                            <input type="text" class="form-control" name="d_place_of_delivery">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_class_id"><strong>Class ID</strong></label>
                                        <select id="d_class_id" name="d_class_id" class="form-control" onchange="updateCategoryOptions()">
                                            <option value="">Select Class ID</option>
                                            @foreach($class as $classdata)
                                                <option value="{{ $classdata->class_id }}">{{ $classdata->class_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="d_category"><strong>Category</strong></label>
                                        <select id="d_category" name="d_category" class="form-control">
                                            <option value="">Select Category</option>
                                            <!-- Options will be populated by JavaScript -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="d_iar_no"><strong>IAR No</strong></label>
                                            <input type="text" class="form-control" name="d_iar_no" id="d_iar_no">
                                            <button id="generate-asset-iar-no" type="button" onclick="generateIARNo()">Generate IAR No</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="d_ics_no"><strong>ICS No</strong></label> 
                                        <label for="splv">
                                            <input type="radio" id="splv" name="option" value="SPLV"> SPLV
                                        </label>
                                        <label for="sphv">
                                            <input type="radio" id="sphv" name="option" value="SPHV"> SPHV
                                        </label>
                                        <label for="rrsp">
                                            <input type="radio" id="rrsp" name="option" value="RRSP"> RRSP
                                        </label>
                                        <input type="text" name="d_ics_no" id="d_ics_no" class="form-control @error('d_ics_no') is-invalid @enderror" >
                                        <button id="generate-asset-ics-no" type="button" onclick="generateICSNo()">Generate ICS No</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="d_bur_no"><strong>BUR No</strong></label>
                                            <input type="text" class="form-control" name="d_bur_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_invoice_no"><strong>Invoice No</strong></label>
                                            <input type="text" class="form-control" name="d_invoice_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_date_invoice"><strong>Date of Invoice</strong></label>
                                            <input type="date" class="form-control" name="d_date_invoice">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_qty"><strong>Quantity Delivered</strong></label>
                                            <input type="number" class="form-control" name="d_qty">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_unit_cost"><strong>Unit Cost</strong></label>
                                            <input type="number" class="form-control" name="d_unit_cost">
                                    </div>
                                    <div class="form-group">
                                        <label for="d_total_cost"><strong>Total Cost</strong></label>
                                            <input type="number" class="form-control" name="d_total_cost">
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4yWf86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
        function generateIARNo() {
            fetch('/generate-asset-iar-no')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('d_iar_no').value = data.d_iar_no;
                });
        }
        </script>
        <script>
        function updateCategoryOptions() {
            var classId = document.getElementById('d_class_id').value;
            var categorySelect = document.getElementById('d_category');

            // Clear existing options, but keep the default option
            while (categorySelect.options.length > 1) {
                categorySelect.remove(1);
            }

            // Get the map of class_ids to categories
            var classToCategoryMap = @json($classToCategoryMap);

            // Get the categories for the selected class_id
            var categories = classToCategoryMap[classId];

            // Check if there are any categories for the selected class_id
            if (categories) {
                // Add new options to the categorySelect
                categories.forEach(category => {
                    var option = document.createElement('option');
                    option.value = category;
                    option.text = category;
                    categorySelect.add(option);
                });
            }
        }
        </script>
        <script>
        function generateICSNo() {
            var selectedOption = $('input[name="option"]:checked').val();

            $.ajax({
                url: '/generateICSNo', // replace with the actual URL
                method: 'POST',
                data: {
                    option: selectedOption,
                    _token: '{{ csrf_token() }}' // for CSRF protection
                },
                success: function(response) {
                    $('#d_ics_no').val(response.icsNo);
                }
            });
        }
        </script>
    </body>
</html>