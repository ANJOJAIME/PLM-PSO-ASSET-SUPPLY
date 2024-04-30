<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (!isset($pdf))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @endif
    <title>PSO | Request and Issue Slip Generation</title>
    <style>
    .text1 {
    font-family: Arial;
    font-style: normal;
    font-size: 12px;
  }
  .text2 {
    font-family: Arial;
    font-size: 12px;
    font-style: normal;
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
        <h1>REQUISITION AND ISSUE SLIP</h1>
        PAMANTASAN NG LUNGSOD NG MAYNILA <br>
        intramuros, manila <br><br><br>
    </div>

    <div>
    <pre style="font-family: Arial; font-size: 15px;">   Division: {{ session('form_data.division') }}              Responsibility Center: {{ session('form_data.center') }}            RIS No: {{ session('form_data.ris') }}
   Office: {{ session('form_data.office') }}                 Code: {{ session('form_data.code') }}                                       SAI No: {{ session('form_data.sai') }}                              Date: {{ date('Y-m-d') }}
                                           
    </pre>
    </div>

    <table style="border: 1px solid black; text-align: center;">
        <tr>
            <th colspan="8">Requisition </th>
            <th colspan="2">Issuance</th>
            
        <tr>
            <th>Stock No.</th>
            <th>Unit</th>
            <th colspan="5">Description</th>
            <th>Quantity</th>
            <th>Quantity</th>
            <th>Remarks</th>
        </tr>
        @if(is_array(session('form_data.stock_no')))
                @foreach(session('form_data.stock_no') as $index => $stock_no)
                    <tr>
                        <td>{{ $stock_no }}</td>
                        <td>{{ session('form_data.unit')[$index] }}</td>
                        <td colspan="5">{{ session('form_data.description')[$index] }}</td>
                        <td>{{ session('form_data.rqty')[$index] }}</td>
                        <td>{{ session('form_data.iqty')[$index] }}</td>
                        <td>{{ session('form_data.remarks')[$index] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ session('form_data.stock_no') }}</td>
                    <td>{{ session('form_data.unit') }}</td>
                    <td colspan="5">{{ session('form_data.description') }}</td>
                    <td>{{ session('form_data.rqty') }}</td>
                    <td>{{ session('form_data.iqty') }}</td>
                    <td>{{ session('form_data.remarks') }}</td>
                </tr>
            @endif
    
            <tr>
            <td colspan="10" style="text-align: left;">Purposes: {{ session('form_data.purpose') }}</td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: left;"></td>
            <td colspan="2" style="text-align: left;">Requested by: {{ session('form_data.requested') }}</td>
            <td colspan="2" style="text-align: left;">Approved by: {{ session('form_data.approved') }}</td>
            <td colspan="2" style="text-align: left;">Issued by: {{ session('form_data.issued') }}</td>
            <td colspan="2" style="text-align: left;">Accepted by: {{ session('form_data.accepted') }}</td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: left;">Signature:</td>
            <td colspan="8" style="text-align: left;"></td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: left;">Printed Name:</td>
            <td colspan="8" style="text-align: left;"> {{ session('form_data.printedname') }}</td>
            </tr>
            <tr>
            <td colspan="2" style="text-align: left;">Designation:</td>
            <td colspan="8" style="text-align: left;"> {{ session('form_data.designation') }}</td>
            </tr>
    </table>


    @if (!isset($pdf))
        <!-- PR MODAL -->
        <div class="modal fade" id="PRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="height: 50px;">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Purchase Request Form</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('generatePDF1') }}">
                            @csrf
                            <div class="form-group">
                                <label for="division-input"><strong>Division</strong></label>
                                <input type="text" class="form-control" id="division-input" name="division" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="center-input"><strong>Responsibility Center</strong></label>
                                <input type="text" class="form-control" id="center-input" name="center" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="RIS-input"><strong>RIS No</strong></label>
                                <input type="text" class="form-control" id="RIS-input"  name="ris" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="office-input"><strong>Office</strong></label>
                                <input type="text" class="form-control" id="office-input" name="office" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="code-input"><strong>Code</strong></label>
                                <input type="text" class="form-control" id="code-input" name="code" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="sai-input"><strong>SAI No</strong></label>
                                    <input type="text" class="form-control" id="sai-input" name="sai" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="purpose-input"><strong>Purpose</strong></label>
                                    <input type="text" class="form-control" id="purpose-input" name="purpose" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="requested-input"><strong>Requested by</strong></label>
                                    <input type="text" class="form-control" id="requested-input" name="requested" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="approved-input"><strong>Approved by</strong></label>
                                    <input type="text" class="form-control" id="requested-input" name="approved" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="issued-input"><strong>Issued by</strong></label>
                                    <input type="text" class="form-control" id="issued-input" name="issued" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="accepted-input"><strong>Accepted by</strong></label>
                                    <input type="text" class="form-control" id="accepted-input" name="accepted" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="printedname-input"><strong>Printed Name</strong></label>
                                    <input type="text" class="form-control" id="printedname-input" name="printedname" autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <label for="designation-input"><strong>Designation</strong></label>
                                    <input type="text" class="form-control" id="designation-input" name="designation" autocomplete="off">
                            </div>
                            <table id="itemsTable" class="table" style="border: 1px solid black; text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Stock No</th>
                                        <th>Unit</th>
                                        <th>Description</th>
                                        <th>Requisition Quantity</th>
                                        <th>Issuance Quantity</th>
                                        <th>Remarks</th>
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
            $(document).on('change', '.stock-input', function() {
                var stock_no = $(this).val();
                var row = $(this).closest('tr');

                $.get('/supplies/unit', {stock_no: stock_no}, function(data) {
                    row.find('.unit-input').val(data.unit);
                    row.find('.description-input').val(data.description);
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
                            <select class="form-control stock-input" name="stock_no[]">
                                <option value="">Select an stock_no</option>
                                @foreach($supplies as $supply)
                                    @if(!is_null($supply->stock_no))
                                        <option value="{{ $supply->stock_no }}">{{ $supply->stock_no }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" class="form-control unit-input" name="unit[]" readonly autocomplete="off"></td>
                        <td><input type="text" class="form-control description-input" name="description[]" readonly autocomplete="off"></td>
                        <td><input type="number" class="form-control" name="rqty[]" autocomplete="off"></td> 
                        <td><input type="number" class="form-control" name="iqty[]" autocomplete="off"></td>
                        <td><input type="text" class="form-control" name="remarks[]" autocomplete="off"></td>
                    </tr>
                `;

                $('#itemsTable tbody').append(newRow);
            });
            });
        </script>


</body>
</html>