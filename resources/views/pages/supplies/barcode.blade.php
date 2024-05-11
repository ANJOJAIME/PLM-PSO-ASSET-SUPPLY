<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>
</head>
<body>
    <div style="text-align: center; font-size: 10px;">
        PURCHASE AND SUPPLIES OFFICE<br>
        PAMANTASAN NG LUNGSOD NG MAYNILA<br>
        General Luna, corner Muralla St, Intramuros, Manila, 1002 Metro Manila<br><br>
        <div style="text-align: center;">
            {!! $barcode !!}
        </div>
        <br>
        <div style="text-align: center; margin-left: 50px;">
            <strong>Item No:</strong> {{ $data['item_no'] }}                            <strong>Requesting Office:</strong> {{ $data['requesting_office'] }}<br>      
            <strong>Description:</strong> {{ $data['description'] }}                    <strong>Report No:</strong> {{ $data['report_no'] }}<br>
            <strong>Unit:</strong> {{ $data['unit'] }}                                  <strong>RIS No:</strong> {{ $data['ris_no'] }}<br>
            <strong>Date Issuance:</strong> {{ $data['date_issuance'] }}
        </div>
    </div>
</body>
</html>
