<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>CREATE | Supplies in Main</title>
        
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
                top: 200px;
                right: 350px;
                width: 800px;
                height: 280px;
                flex-shrink: 0;
                border-radius: 8px;
                background: #E6EDFD;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            }
            .input-group {
                top: 10px;
                display: flex;
                align-items: center;
                gap: 15px;
                justify-content: space-between;
                margin: 10px 0;
            }

            .input-group label {
                flex-shrink: 0;
                width: 120px;
            }
            
            .btn-danger {
                position: fixed;
                top: 530px;
                left: 590px;
                border-radius: 8px;
                border: 0.5px solid #000;
                color: black;
                background: #D1DFFF;
                width: 194px;
                height: 38px;
                flex-shrink: 0;
            }
            .btn-danger:hover{
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
        <div>
            <a href="{{url('asset-view')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-body">
                        <h1><strong>Main Table</strong></h1>
                        <form action="{{url('/storeasset')}}" class="form-body" method="POST" autocomplete="off">
                            @csrf
                        
                            <div class="input-group">
                                <label for="pr_no"><strong>PR No:</strong></label>
                                <select name="pr_no" class="form-control @error('pr_no') is-invalid @enderror">
                                    <option value="">Select PR No.</option>
                                    @foreach($assets as $asset)
                                        <option value="{{ $asset->pr_no }}" {{ old('pr_no') == $asset->pr_no ? 'selected' : '' }}>
                                            {{ $asset->pr_no }}{{ $asset->added ? '(Added)' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <label for="item_no"><strong>Item No:</strong></label>
                                <input type="text" id="item_no" name="item_no" class="form-control @error('item_no') is-invalid @enderror">
                                <button id="generate-item-no" type="button">Generate Item No</button>
                                @error('item_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label for="class_id"><strong>Class ID:</strong></label>
                                <input type="text" id="class_id" name="class_id" class="form-control @error('class_id') is-invalid @enderror">
                                <button id="generate-class-id" type="button">Generate Class ID</button>
                            </div>
                            <div class="input-group">
                                <label for="category"><strong>Category:</strong></label>
                                <input type="text" name="category" value="{{ $asset->category }}" class="form-control @error('category') is-invalid @enderror">
                                @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            document.querySelector('form').addEventListener('submit', function(event) {
                var item_no = document.querySelector('input[name="item_no"]').value;
                var class_id = document.querySelector('input[name="class_id"]').value;
                var category = document.querySelector('input[name="category"]').value;
                var description = document.querySelector('input[name="description"]').value;
                var details = document.querySelector('input[name="details"]').value;

                var message = 'Are you sure you want to ADD this item:\n' +
                    'Item No: ' + item_no + '\n' +
                    'Classification ID: ' + class_id + '\n' +
                    'category: ' + category + '\n' +
                    'Item Description: ' + description + '\n' +
                    'Details: ' + details +
                    "\nif not select 'cancel'";

                if (!confirm(message)) {
                    event.preventDefault();
                }
            });
        </script>
        
        <script>
                document.getElementById('generate-class-id').addEventListener('click', function() {
                    fetch('/generate-class-id')
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('class_id').value = data.class_id;
                        });
                });
        </script>
    </body>
</html>