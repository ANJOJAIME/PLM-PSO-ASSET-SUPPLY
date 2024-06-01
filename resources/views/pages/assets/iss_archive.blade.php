<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | Supplies Archive</title>

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
                right: 170px;
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
        </style>

    <body>
        <div class="label"><strong>Archived Delivered</strong></div>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <h1>Archived Delivered</h1>
        <a href="{{url('/delivery-view')}}" class="btn btn-primary"><strong>Back to Main</strong></a>
        <div class="container">
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>PAR No</th>
                            <th>Property No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($iasset as $issuance)
                            <tr>
                                <td>{{ $issuance->i_description }}</td>
                                <td>{{ $issuance->i_par_no }}</td>
                                <td>{{ $issuance->i_property_no }}</td>
                                <td>
                                    <a href="{{ route('pages.issuance.recover', ['id' => $issuance->id]) }}" class="btn-recover">Recover</a>
                                    <form method="POST" action="{{ route('pages.issuance.forceDelete', ['id' => $issuance->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Permanently Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>