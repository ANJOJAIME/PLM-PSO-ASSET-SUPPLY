<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLM | ASSET AND SUPPLY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            margin-left: 20px;
            margin-right: 0;
        }
        .table {
            width: 980px;
            table-layout: fixed;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            border: 1px solid #dee2e6; /* Add this line */
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6; /* Modify this line */
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            text-align: center;
        }

        .table tbody + tbody {
            border: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
    </style>
</head>
<body>
    <div style="text-align: center">
        <h1>ASSET GENERAL REPORT</h1>
        PAMANTASAN NG LUNGSOD NG MAYNILA <br>
        intramuros, manila <br><br><br>
    </div>
    
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Item No</th>
                <th>Classification ID</th>
                <th>Category</th>
                <th>Item Description</th>
                <th>Unit</th>
                <th>PO No</th>
                <th>PR No</th>
                <th>Details</th>
            </tr>   
            @if($asset->isNotEmpty())
                @foreach($asset as $asssetdata)
                    <tr>
                        <td>{{ $asssetdata->item_no }}</td>
                        <td>{{ $asssetdata->class_id }}</td>
                        <td>{{ $asssetdata->category }}</td>
                        <td>{{ $asssetdata->description }}</td>
                        <td>{{ $asssetdata->unit }}</td>
                        <td>{{ $asssetdata->po_no }}</td>
                        <td>{{ $asssetdata->pr_no }}</td>
                        <td>{{ $asssetdata->details }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    <?php
    // Database add operation code here
    ?>
    
</body>
</html>