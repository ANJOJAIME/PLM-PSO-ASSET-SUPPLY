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
                    top: 175px;
                    height: 70%;
                    width: 75%;
                    overflow-y: auto;
                    overflow-x: auto; /* Ensures horizontal scrolling */
                    scrollbar-width: thin; /* Adjust the width of the scrollbar */
                    scrollbar-color: #4F74BB #EFF0FF; /* Adjust the colors of the scrollbar */
                    border-radius: 15px;
                    background-color: white;
            }
.table-container table {
    border-collapse: collapse;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    table-layout: auto; /* Adjusts column width automatically */
}

.table-container th, .table-container td {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
    white-space: nowrap; /* Prevents text from wrapping */
}

.table-container td {
    border-collapse: separate;
    word-wrap: break-word; /* Ensures long words break to the next line */
}

.table-container th {
    position: sticky;
    top: 0; /* Ensures the header stays at the top while scrolling */
    background-color: #e6edfd;
    font-weight: bold;
    white-space: nowrap; /* Prevents text from wrapping */
    padding: 20px; /* Increased padding for table headers */
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
        <div class="label"><strong>Archived Purchase Orders</strong></div>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <h1>Archived Purchase Orders</h1>
        <a href="{{url('/purchase-order-view')}}" class="btn btn-primary"><strong>Back to Main</strong></a>
        <div class="container">
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item No</th>
                            <th>Description</th>
                            <th>Purchase Order No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->item_no }}</td>
                                <td>{{ $order->description }}</td>
                                <td>{{ $order->po_no }}</td>
                                <td>
                                    <a href="{{ route('pages.purchase_order.recover', ['id' => $order->id]) }}" class="btn-recover">Recover</a>
                                    <form method="POST" action="{{ route('pages.purchase_order.forceDelete', ['id' => $order->id]) }}">
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