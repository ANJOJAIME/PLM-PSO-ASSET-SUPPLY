<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (!isset($pdf))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">    
    @endif
    <title>PSO | Request and Issue Slip Generation</title>
    <style>
          .text1 {
    font-family: Arial, sans-serif;
    font-size: 12px;
  }
  .text2 {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin-top: 2px;
    margin-left: 29%;

  }
  table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }
    .rect {
        border: 1px solid black;
        width: 6%;
        height: 2%;
        color: white;
        position: relative;
    }
    .txt1 {
        margin-top: -10%;
        margin-left: 10%;
    }
    .rect1 {
        border: 1px solid black;
        width: 6%;
        height: 2%;
        color: white;
        position: relative;
        margin-left: 55%;
        margin-top: -4%;
    }
    .rect2 {
        border: 1px solid black;
        width: 6%;
        height: 2%;
        color: white;
        position: relative;
        margin-left: 55%;
        margin-top: 2%;
    }
    .txt2 {
        margin-top: -6%;
        margin-left: 65%;
    }
    .txt3 {
        margin-top: 3.5%;
        margin-left: 65%;
    }

    .modal-dialog {
        max-width: 100%;
        width: auto !important;
        display: absolute;
        justify-content: center;
        align-items: center;
        height: 1200px;
        margin: 50px;
        margin-top: 25px;
        margin-bottom: 75px;
    }
    </style>
</head>
<body >

    <div style="text-align: center">
        <h1>INSPECTION & ACCEPTANCE REPORT</h1>
        PAMANTASAN NG LUNGSOD NG MAYNILA <br>
        intramuros, manila <br><br><br>
    </div>

    <div>
    <pre style="font-family: Arial; font-size: 15px;">Supplier: {{ session('form_data.supplier') }}    IAR No: {{ session('form_data.iar') }} <br>
PO No: {{ session('form_data.po') }}   BUR No: {{ session('form_data.bur') }}     PR No: {{ session('form_data.pr') }} <br> 
Date of PO:  {{ session('form_data.date_po') }}  Invoice No: {{ session('form_data.invoice') }} <br>
Req Office: {{ session('form_data.roffice') }}                           Date of Invoice: {{ session('form_data.date_invoice') }} 
    </pre>
    </div>

    <table style="border: 1px solid black; text-align: center;">
            
        <tr>
            <th>Item No.</th>
            <th>Qty</th>
            <th>Unit</th>
            <th colspan="5"></th>
            <th>Unit Price</th>
            <th>Amount</th>
        </tr>
        @if(is_array(session('form_data.item_no')))
            @foreach(session('form_data.item_no') as $index => $item_no)
                <tr>
                    <td>{{ $item_no }}</td>
                    <td>{{ session('form_data.qty')[$index] }}</td>
                    <td>{{ session('form_data.unit')[$index] }}</td>
                    <td colspan="5"></td>
                    <td>{{ session('form_data.unitcost')[$index] }}</td>
                    <td>{{ session('form_data.qty')[$index] * session('form_data.unitcost')[$index] }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{{ session('form_data.item_no') }}</td>
                <td>{{ session('form_data.qty') }}</td>
                <td>{{ session('form_data.unit') }}</td>
                <td colspan="5"></td>
                <td>{{ session('form_data.unitcost') }}</td>
                <td>{{ session('form_data.qty') * session('form_data.unitcost') }}</td>
            </tr>
        @endif
            <tr>
            <td colspan="5" style="text-align: center;">INSPECTION</td>
            <td colspan="5" style="text-align: center;">ACCEPTANCE</td>
            </tr>
    </table>

    <div>
        <pre>Date Inspected:  {{ session('form_data.date_inspected') }}                         Date Received:  {{ session('form_data.date_received') }}  </pre>
    </div>
    <div class="rect"> </div> 

    <div class="rect1"> </div> 

    <div class="rect2"> </div> 
    
    <div>
        <h5 class="txt1">Inspected, verified and found OK <br>
         to quantity and specifications</h5>

         <h5 class="txt2"> Complete </h5>

         <h5 class="txt3"> Partial </h5>
    </div>

    <div>
        <pre> {{ session('form_data.officer') }}            {{ session('form_data.chief') }} </pre>
        <pre>  Inspection Officer/Committee           Chief, Property & Supplies Office </pre>
    </div>

    @if (!isset($pdf))
        <!-- PR MODAL -->
        <div class="modal fade" id="PRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="height: 50px;">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Inspection & Acceptance Report</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('generatePDF2') }}">
                            @csrf
                            <div class="form-group">
                                <label for="supplier-input"><strong>Supplier</strong></label>
                                <input type="text" class="form-control" id="supplier-input" name="supplier" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="iar-input"><strong>IAR No</strong></label>
                                <input type="text" class="form-control" id="iar-input" name="iar" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="po-input"><strong>PO No</strong></label>
                                <input type="text" class="form-control" id="po-input"  name="po" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="bur-input"><strong>BUR No</strong></label>
                                <input type="text" class="form-control" id="bur-input" name="bur" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="pr-input"><strong>PR No</strong></label>
                                <input type="text" class="form-control" id="pr-input" name="pr" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="invoice-input"><strong>Invoice No</strong></label>
                                    <input type="text" class="form-control" id="invoice-input" name="invoice" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="date_po-input"><strong>Date of PO</strong></label>
                                    <input type="date" class="form-control" id="date_po-input" name="date_po" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="invoice-input"><strong>Invoice No</strong></label>
                                    <input type="text" class="form-control" id="invoice-input" name="invoice" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="roffice-input"><strong>Requesting Office</strong></label>
                                    <input type="text" class="form-control" id="roffice-input" name="roffice" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="date_invoice-input"><strong>Date of Invoice</strong></label>
                                    <input type="date" class="form-control" id="date_invoice-input" name="date_invoice" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="date_inspected-input"><strong>Date Inspected</strong></label>
                                    <input type="date" class="form-control" id="date_inspected-input" name="date_inspected" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="date_acceptance-input"><strong>Date Acceptance</strong></label>
                                    <input type="date" class="form-control" id="date_acceptance-input" name="date_acceptance" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="officer-input"><strong>Inspection Officer/Committee</strong></label>
                                    <input type="text" class="form-control" id="officer-input" name="officer" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="chief-input"><strong>Chief, Property & Supplies Office</strong></label>
                                    <input type="text" class="form-control" id="chief-input" name="chief" autocomplete="off">
                            </div>
                            <table id="itemsTable" class="table" style="border: 1px solid black; text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Item No</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dynamic rows will be added here -->
                                </tbody>
                            </table>
                            <button type="button" id="addRow" class="btn btn-primary">Add Row</button>
                            <button type="submit" class="btn btn-primary">Generate PDF</button>
                            <a type="button" class="btn btn-danger" href="supply-forms-and-reports-generation">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script>
        $(document).ready(function(){
            $("#PRModal").modal('show');
        });
        </script>
        <script>
            $(document).on('change', '.item-input', function() {
                var item_no = $(this).val();
                var row = $(this).closest('tr');

                $.get('/supplies/unit', {item_no: item_no}, function(data) {
                    row.find('.unit-input').val(data.unit);
                });
            });
        </script>
        <script>
            var supplies = @json($supplies);
        </script>
        <script>
            $(document).ready(function() {
                $('#addRow').click(function() {
                var newRow = `
                    <tr>
                        <td>
                            <select class="form-control item-input" name="item_no[]">
                                <option value="">Select an item</option>
                                @foreach($supplies as $supply)
                                    @if(!is_null($supply->item_no))
                                        <option value="{{ $supply->item_no }}">{{ $supply->item_no }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="qty[]" autocomplete="off"></td> 
                        <td><input type="text" class="form-control unit-input" name="unit[]" readonly autocomplete="off"></td>
                        
                        <td><input type="number" class="form-control" name="unitcost[]" autocomplete="off"></td>
                        <td><input type="text" class="form-control" name="amount[]" autocomplete="off" readonly></td>
                    </tr>
                `;

                $('#itemsTable tbody').append(newRow);
            });
            });
        </script>
</body>
</html>