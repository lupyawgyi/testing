<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Sim ListSi</title>
</head>
<body>
@foreach($check as $monthly)
@endforeach
<h3>Dear {{$monthly->staff->branch->name}} Manager</h3>
<p> Kindly check below par phone list and staff position and then confirm me for <strong>{{ \Carbon\Carbon::now()->addMonthsNoOverflow(1)->format('F') }}</strong> 2020. We will support the company
    phone bill for only these person. So kindly check and confirm below list. If you didn't confirm until <strong style="color: darkred">{{ \Carbon\Carbon::now()->addDays(5)->toDateString() }}</strong>, We
    will support only below per phone list for <strong>{{ \Carbon\Carbon::now()->addMonthsNoOverflow(1)->format('F') }}</strong> 2020. </p>
<h4>Thank you.</h4>
<div>
    <table cellpadding="0" cellspacing="0" width="640" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Phone Number</th>
        </tr>
        </thead>
        <tbody cellpadding="0" cellspacing="0" width="100%" align="center" border="1">
        @if(!empty($check) )
            @foreach($check as $device)
                <tr>
                    <td style="text-align: left">{{$device->staff->fullName}}</td>
                    <td>{{$device->staff->position->name}}</td>
                    <td>{{$device->phone->phoneNumber}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Phone Number</th>
        </tr>
        </tfoot>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $("#mm").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'excel',
                'csv',
                'pdf',
                'copy'

            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "ALL"]],
        });

    });
</script>
</body>
</html>
