<!DOCTYPE html>   

<html lang="en">   

<head>   

    <meta charset="UTF-8">   

    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <title>Document</title>   

    <style>   

    table {   

        border-collapse: collapse;   

        width: 100%;   

        margin: 0 auto; /* Added: Center align table */   

    }   

   

    th, td {   

        border: 1px solid black;   

        padding: 5px;   

        text-align: center;   

    }   

   

    tr:nth-child(even) {   

        background-color: #ffffff;   

    }   

    .pre1 {   

        font-family: Arial, sans-serif;   

        font-size: 12px;   

        margin-bottom: 0;   

        margin-left: 58%;   

    }   

    .pre2 {   

      font-family: Arial, sans-serif;   

      font-size: 12px;   

      margin-bottom: 0;   

      margin-left: 58%;   

      margin-top: 35%;   

  }   

  .text1 {   

    font-family: Arial, sans-serif;   

    font-size: 12px;   

    margin-bottom: 0;   

    margin-left: 29%;   

  }   

</style>   

   

</head>   

<body>   

   

    <div style="text-align: center; margin-bottom: 0;">   

        <h6>PAMANTASAN NG LUNGSOD NG MAYNILA <br>   

        (University of the City of Manila)<br>    

           SUMMARY OF SUPPLIES AND MATERIALS ISSUED </h6>   

   

    </div>   

   

    <div class="text1">   

    <pre>   For the Period      _________________  to    _______________</pre>   

   

    <pre>                                                                                     No. _____________________</pre>   

    </div>   

   

        <table style="border: 1px solid black; text-align: center;">   

        <tr>   

            <th rowspan="2">Item No.</th>   

            <th rowspan="2">Item Description</th>   

            <th rowspan="2">Unit of Mea.</th>   

            <th rowspan="2">Stock on Hand</th>   

            <th colspan="16">Requisition and Issue Slip Numbers Used for Office Supplies Quantity Issued</th>   

            <th rowspan="2">Total Issued</th>   

            <th rowspan="2">Unit Cose (php)</th>   

            <th rowspan="2">Total cost (php)</th>   

            <th rowspan="2">Balance on Hand</th>   

        </tr>   

        <tr>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

            <td></td>   

        </tr>   

        @if($orders->isNotEmpty())   

                @foreach($orders as $order)   

                    <tr>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $order->name }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                        <td>{{ $loop->iteration }}</td>   

                    </tr>   

                @endforeach   

            @endif   

   

        <tr>   

            <td colspan="12" >Prepared by: _______________________________</td>   

            <td colspan="12" >Approved by: _______________________________</td>   

        </tr>   

   

        </table>   

</body>   

</html> 