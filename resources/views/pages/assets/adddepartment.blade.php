<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | Add Department</title>
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
                border-radius: 0.5px;
                width: 1084px;
                height: 31px;
                border: 0.5px solid #000;
                background: #D1DFFF;
            }
            .card-body{
                position: fixed;
                top: 250px;
                right: 370px;
                width: 800px;
                height: 250px;
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
                gap: 5px;
                justify-content: space-between;
                margin: 8px 0;
                width: 600px;
            }
            .input-group label {
                flex-shrink: 0;
                width: 150px; /* adjust as needed */
            }
            @media (max-width: 1200px) {
                .card-body {
                    right: 200px;
                    width: 600px;
                }
                .input-group {
                    width: 400px;
                }
            }
            
            @media (max-width: 992px) {
                .card-body {
                    right: 100px;
                    width: 400px;
                }
                .input-group {
                    width: 300px;
                }
            }
            
            @media (max-width: 768px) {
                .card-body {
                    right: 50px;
                    width: 300px;
                }
                .input-group {
                    width: 200px;
                }
            }
            .btn1-primary {
                position: fixed;
                top: 520px;
                left: 550px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 170px;
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
                top: 520px;
                left: 360px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 170px;
                height: 38px;
                flex-shrink: 0;
                color: black;
            }
            .btn-primary:hover{
                background-color: green;
                color: white;
                border: none;
            }
        </style>
    </head>
    <body>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div class ="card-header">
            <a href="{{url('plm-departments')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Add PLM Department</strong></h1>
                            <form action="{{url('/asset-storedepartment')}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                    <div class="input-group">
                                        <label for="department_name"><strong>Department Name:</strong></label>
                                        <input type="text" name="department_name" class="form-control @error('description') is-invalid @enderror">
                                        @error('department_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="department_head"><strong>Department Head:</strong></label>
                                        <input type="text" name="department_head" class="form-control @error('department_head') is-invalid @enderror">
                                        @error('department_head')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="contact"><strong>Email:</strong></label>
                                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror">
                                        @error('department_contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
            document.querySelector('form').addEventListener('submit', function(event) {
                let stock_no = document.querySelector('select[name="department_name"]').value;
                let description = document.querySelector('input[name="department_head"]').value;
                let date_issuance = document.querySelector('input[name="contact"]').value;

                var message = 'Are you sure you want to ADD this item:\n' +
                    'Department Name: ' + department_name + '\n' +
                    'Department Head: ' + department_head + '\n' +
                    'Contact: ' + contact + '\n';
            });
        </script>
    </body>
</html>