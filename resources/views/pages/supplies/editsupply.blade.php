<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | Supplies Main</title>
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
                border-radius: none;
                width: 700px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .card-body{
                position: fixed;
                top: 200px;
                right: 350px;
                width: 800px;
                height: 300px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .input-group {
                top: 35px;
                display: flex;
                align-items: center;
                gap: 10px;
                justify-content: space-between;
                margin: 10px 0;
            }

            .input-group label {
                flex-shrink: 0;
                width: 100px; /* adjust as needed */
            }

            .btn1-primary {
                position: fixed;
                top: 530px;
                left: 590px;
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
                top: 530px;
                left: 380px;
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
            <a href="{{url('supplies-view')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Edit Supply Main</strong></h1>
                            <form action="{{url('/updatesupplies/'.$supply->pr_no)}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                @method ('PUT') 
                                <div class="input-group">
                                    <label for="stock_no"><strong>Stock No:</strong></label>
                                    <input type="text" name="stock_no" value="{{ $supply->stock_no }}" class="form-control @error('description') is-invalid @enderror">
                                    @error('stock_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="description"><strong>Item Description:</strong></label>
                                    <input type="text" name="description" value="{{ $supply->description }}" class="form-control @error('description') is-invalid @enderror">
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <label for="unit"><strong>Unit:</strong></label>
                                    <input type="text" name="unit" value="{{ $supply->unit }}" class="form-control @error('unit') is-invalid @enderror">
                                    @error('unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                var stockNoField = document.querySelector('input[name="stock_no"]');
                stockNoField.placeholder = "Error: Please enter a valid Stock Number";
                stockNoField.style.color = "red";

                var descriptionField = document.querySelector('input[name="description"]');
                descriptionField.placeholder = "Error: Please enter a valid Description";
                descriptionField.style.color = "red";

                var unitField = document.querySelector('input[name="unit"]');
                unitField.placeholder = "Error: Please enter a Valid Unit";
                unitField.style.color = "red";
            }
        </script>
        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                var stock_no = document.querySelector('input[name="stock_no"]').value;
                var description = document.querySelector('input[name="description"]').value;
                var unit = document.querySelector('input[name="unit"]').value;

                var message = 'Are you sure you want to EDIT this item:\n' +
                    'Stock No: ' + stock_no + '\n' +
                    'Description: ' + description + '\n' +
                    'Unit: ' + unit + '\n' +
                    "\nif not select 'cancel'";

                if (!confirm(message)) {
                    event.preventDefault();
                }
            });
        </script>
    </body>
</html>