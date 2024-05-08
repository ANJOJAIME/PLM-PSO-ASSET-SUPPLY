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
        <h1>SUPPLIES GENERAL REPORT</h1>
        <strong>PAMANTASAN NG LUNGSOD NG MAYNILA</strong><br>
        General Luna, corner Muralla St, Intramuros, Manila, 1002 Metro Manila <br><br><br>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Item Description</th>
                <th>Unit</th>
                <th>Delivered</th>
                <th>Issued</th>
                <th>Balance</th>
                <th>Status</th>
            </tr>   
            @if($supplies->isNotEmpty())
                @foreach($supplies as $suppliesdata)
                    @php
                        $issuedTotal = $issuedTotals[$suppliesdata->description] ?? 0;
                        $balanceAfter = $suppliesdata->totalDelivered - $issuedTotal;
                        $status = 'No value yet'; // Default status
                        if ($balanceAfter <= 50 && $balanceAfter > 1) {
                            $status = 'LOW LEVEL';
                        } elseif ($balanceAfter > 50 && $balanceAfter <= 100) {
                            $status = 'MID LEVEL';
                        } elseif ($balanceAfter > 100) {
                            $status = 'HIGH LEVEL';
                        }
                    @endphp
                    <tr>
                        <td>{{$suppliesdata->description}}</td>
                        <td>{{$suppliesdata->unit}}</td>
                        <td>{{$suppliesdata->totalDelivered}}</td>
                        <td>{{ $issuedTotal }}</td>
                        <td>{{ $balanceAfter }}</td>
                        <td>{{ $status }}</td>
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