<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
        <title>PLM | Supplies Archive: Issued</title>

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
                left: 0;
                top: 0;
                width: calc(100% - 20px);
                height: 90px;
                flex-shrink: 0;
                background: #FFF;
                border-radius: 0px 0px 12px 12px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                justify-content: space-between;
                padding: 0 20px;
                z-index: 2;
            }
            .custom-header {
                position: absolute;
                left: 0px; /* Adjust as needed */
                top: 0px;
                width: 1535px;
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
            .table-container {
                position: absolute;
                left: 11%;
                top: 160px;
                height: 70%;
                width: 80%;
                overflow-y: auto;
                overflow-x: auto;
                border-radius: 15px;
                background-color: white;
            }

            .table-container table {
                border-collapse: collapse;
                width: 100%;
                height: 100%;
                border-radius: 15px;
                overflow: hidden;
                table-layout: fixed;
                
            }

            .table-container th, .table-container td {
                text-align: center;
                padding: 8px;
                border: 1px solid #ddd;
            }

            .table-container td{
                border-collapse: separate;
                word-wrap: break-word;
            }

            .table-container th {
                position: sticky;
                background-color: #e6edfd;
                font-weight: bold;
            }

            .table-container tbody tr:nth-child(odd) {
                background-color: white;
            }
            .table-container tbody tr:nth-child(even) {
                background-color: #f8f9fc;
            }
            .table-container tbody tr:hover {
                background-color: #dfe0e3;
            }
            .btn-recover, .btn-delete{
                background-color: #EFF0FF; 
                color: #000;
                font-size: 15px;
                padding: 5px 5px;
                border-radius: 8px;
                text-align: center;
                border: none;
            }
            .btn-recover:hover {
                background-color: green;
                color: white;
            }
            .btn-delete:hover {
                background-color: red;
                color: white;
            }
            .btn-recover:hover{
                text-decoration: none;
            }
            .btn-primary {
                position: absolute;
                text-align: center;
                border:none;
                top: 100px;
                right: 195px;
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
                background-color: blue;
                color: white;
            }
            ::-webkit-scrollbar {
                width: 10px;
                border-color: black;
            }

            ::-webkit-scrollbar-track {
                background: transparent;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb {
                background: #4F74BB;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #2D349A;
            }
            .label{
                position: absolute;
                color: white;
                font-size: 30px;
                z-index: 3; 
                top: 115px; 
                left: 170px;"
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
        </style>

    <body>
        <div class="label"><strong>Deleted Issued Items</strong></div>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <a href="{{url('/issued-supplies-view')}}" class="btn btn-primary"><i class="bi bi-arrow-return-left"></i><strong> Back to Issued Table</strong></a>
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
        <div class="container">
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Stock No</th>
                            <th>Item Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issued as $issueddata)
                            <tr>
                                <td>{{ $issueddata->stock_no }}</td>
                                <td>{{ $issueddata->description }}</td>
                                <td>
                                    <a href="{{ route('pages.issued.recover', ['stock_no' => $issueddata->stock_no]) }}" class="btn-recover"><i class="fa fa-recycle"></i>Recover</a>
                                    <form method="POST" action="{{ route('pages.issued.forceDelete', ['stock_no' => $issueddata->stock_no]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete"><i class="bi bi-trash"></i>Permanently Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>