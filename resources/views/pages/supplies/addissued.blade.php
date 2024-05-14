@php
$defaultDescription = '';
if (isset($issued) && $issued->stock_no) {
    $item = $items->firstWhere('stock_no', $issued->stock_no);
    $defaultDescription = $item ? $item->description : '';
}
@endphp

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PLM | Issued Supplies</title>
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
                top: 140px;
                right: 370px;
                width: 800px;
                height: 400px;
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
                gap: 2px;
                justify-content: space-between;
                margin: 5px 0;
                width: 600px;
            }
            .input-group label {
                flex-shrink: 0;
                width: 150px; /* adjust as needed */
            }
            .btn1-primary {
                position: fixed;
                top: 570px;
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
                top: 570px;
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
            <a href="{{url('issued-supplies-view')}}" class="btn btn1-primary">Cancel</a>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong>Add Issued Supply</strong></h1>
                            <form action="{{url('/storenewissued')}}" class="form-body" method="POST" autocomplete="off">
                                @csrf 
                                <div class="input-group">
                                    <label for="stock_no"><strong>Stock No.:</strong></label>
                                    <select name="stock_no" id="stock_no" class="form-control @error('stock_no') is-invalid @enderror" data-url="{{ url('description') }}/">
                                        <option value="">Select Stock No.</option>
                                        @foreach($items as $item)
                                            @php
                                                // Calculate the total issued for the current item description
                                                $issuedTotal = $issuedTotals[$item->description] ?? 0;
                                                // Calculate the remaining balance for the current supply
                                                $balanceAfter = $item->totalDelivered - $issuedTotal;
                                            @endphp
                                            <option value="{{ $item->stock_no }}"
                                                    {{ old('stock_no', $issued->stock_no ?? '') == $item->stock_no ? 'selected' : '' }}
                                                    @if($balanceAfter <= 0) disabled @endif>
                                                {{ $item->stock_no }} - {{ $item->description }}
                                                @if($balanceAfter <= 0)
                                                    (Out of Stock)
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('stock_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    <div class="input-group">
                                        <label for="description"><strong>Item Description:</strong></label>
                                        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $defaultDescription) }}" readonly>
                                    </div>
                                    <div class="input-group">
                                        <label for="date_issuance"><strong>Date of Issuance:</strong></label>
                                        <input type="date" name="date_issuance" class="form-control @error('date_issuance') is-invalid @enderror">
                                        @error('date_issuance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="requesting_office"><strong>Requesting Office</strong></label>
                                        <select name="requesting_office" class="form-control @error('requesting_office') is-invalid @enderror">
                                            <option value="">{{ old('requesting_office', $issued->requesting_office ?? 'Select Office') }}</option>
                                            <option value="Accounting Office" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Accounting Office' ? 'selected' : '' }}>Accounting Office</option>
                                            <option value="Budget Office" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Budget Office' ? 'selected' : '' }}>Budget Office</option>
                                            <option value="Cash Office/Treasurer's Office" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Cash Office/Treasurer Office' ? 'selected' : '' }}>Cash Office/Treasurer Office</option>
                                            <option value="Corporate Auditor" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Corporate Auditor' ? 'selected' : '' }}>Corporate Auditor</option>
                                            <option value="Human Resource Devt. Office: Chief" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Human Resource Devt. Office: Chief' ? 'selected' : '' }}>Human Resource Devt. Office: Chief</option>
                                            <option value="Internal Audit Office" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Internal Audit Office' ? 'selected' : '' }}>Internal Audit Office</option>
                                            <option value="ICTO: Director & Asst. Vice President" {{ old('requesting_office', $issued->requesting_office ?? '') == 'ICTO: Director & Asst. Vice President' ? 'selected' : '' }}>ICTO: Director & Asst. Vice President</option>
                                            <option value="Library: Main" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Library: Main' ? 'selected' : '' }}>Library: Main</option>
                                            <option value="Physical Facilities & Management Office: Chief" {{ old('requesting_office', $issued->requesting_office ?? '') == 'Physical Facilities & Management Office: Chief' ? 'selected' : '' }}>Physical Facilities & Management Office: Chief</option>
                                            <option value="OVPA: Admin Staff" {{ old('requesting_office', $issued->requesting_office ?? '') == 'OVPA: Admin Staff' ? 'selected' : '' }}>OVPA: Admin Staff</option>
                                            <option value="CA (Accountancy)" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CA (Accountancy)' ? 'selected' : '' }}>CA (Accountancy)</option>
                                            <option value="CAUP (Architecture & Urban Planning)" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CAUP (Architecture & Urban Planning)' ? 'selected' : '' }}>CAUP (Architecture & Urban Planning)</option>
                                            <option value="CBM (Business & Management): Main" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CBM (Business & Management): Main' ? 'selected' : '' }}>CBM (Business & Management): Main</option>
                                            <option value="CET (Engineering & Technology)" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CET (Engineering & Technology)' ? 'selected' : '' }}>CET (Engineering & Technology)</option>
                                            <option value="CET: Computer Laboratory" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CET: Computer Laboratory' ? 'selected' : '' }}>CET: Computer Laboratory</option>
                                            <option value="CEd: Mabuhay Integrated Learning Center" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CEd: Mabuhay Integrated Learning Center' ? 'selected' : '' }}>CEd: Mabuhay Integrated Learning Center</option>
                                            <option value="CHASS (Humanities & Social Sciences)" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CHASS (Humanities & Social Sciences)' ? 'selected' : '' }}>CHASS (Humanities & Social Sciences)</option>
                                            <option value="CM: PLM-Ospital ng Maynila Medical Center" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CM: PLM-Ospital ng Maynila Medical Center' ? 'selected' : '' }}>CM: PLM-Ospital ng Maynila Medical Center</option>
                                            <option value="CPT: Clinic" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CPT: Clinic' ? 'selected' : '' }}>CPT: Clinic</option>
                                            <option value="CS: Science Laboratory" {{ old('requesting_office', $issued->requesting_office ?? '') == 'CS: Science Laboratory' ? 'selected' : '' }}>CS: Science Laboratory</option>
                                            <option value="OSDS: NSTP (DMST and CWTS)" {{ old('requesting_office', $issued->requesting_office ?? '') == 'OSDS: NSTP (DMST and CWTS)' ? 'selected' : '' }}>OSDS: NSTP (DMST and CWTS)</option>
                                            <option value="OVPAA: VP for Academic Affairs" {{ old('requesting_office', $issued->requesting_office ?? '') == 'OVPAA: VP for Academic Affairs' ? 'selected' : '' }}>OVPAA: VP for Academic Affairs</option>
                                            <option value="SSC Supreme Student Council" {{ old('requesting_office', $issued->requesting_office ?? '') == 'SSC Supreme Student Council' ? 'selected' : '' }}>SSC Supreme Student Council</option>
                                        </select>
                                        @error('requesting_office')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="report_no"><strong>Report No:</strong></label>
                                        <input type="text" name="report_no" class="form-control @error('report_no') is-invalid @enderror">
                                        @error('report_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="ris_no"><strong>RIS No:</strong></label>
                                        <input type="text" name="ris_no" class="form-control @error('ris_no') is-invalid @enderror">
                                        @error('ris_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="quantity_issued"><strong>Quantity Issued:</strong></label>
                                        <input type="text" name="quantity_issued" class="form-control @error('quantity_issued') is-invalid @enderror">
                                        @error('issued')
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
                let stock_no = document.querySelector('select[name="stock_no"]').value;
                let description = document.querySelector('input[name="description"]').value;
                let date_issuance = document.querySelector('input[name="date_issuance"]').value;
                let requesting_office = document.querySelector('select[name="requesting_office"]').value;
                let report_no = document.querySelector('input[name="report_no"]').value;
                let ris_no = document.querySelector('input[name="ris_no"]').value;
                let quantity_issued = document.querySelector('input[name="quantity_issued"]').value;

                var message = 'Are you sure you want to ADD this item:\n' +
                    'Stock No.: ' + stock_no + '\n' +
                    'Item Description: ' + description + '\n' +
                    'Date of Issuance: ' + date_issuance + '\n' +
                    'Requesting Office: ' + requesting_office + '\n' +
                    'Report No.: ' + report_no + '\n' +
                    'RIS No.: ' + ris_no + '\n' +
                    'Quantity Issued: ' + quantity_issued + '\n';
            });
        </script>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stockNoDropdown = document.getElementById('stock_no');
            const descriptionInput = document.getElementById('description');

            stockNoDropdown.addEventListener('change', function() {
                // Find the selected option
                const selectedOption = this.options[this.selectedIndex];
                // Extract the description part from the option text (assuming format "stock_no - description")
                const description = selectedOption.text.split(' - ')[1] || '';
                // Set the description input field
                descriptionInput.value = description;
            });

            // Trigger change event on page load in case there's a selected option
            if (stockNoDropdown.value) {
                stockNoDropdown.dispatchEvent(new Event('change'));
            }
        });
        </script>

    </body>
</html>