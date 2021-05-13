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
@foreach($phones as $monthly)
@endforeach
<h3>Dear {{$monthly->phone->company->name}} Team</h3>
<h4>Kindly fill  below per phone number List. We would like to add phone Bill Amount for {{ \Carbon\Carbon::now()->addMonthsNoOverflow(1)->format('F') }}.</h4>
<h4>Thank you.</h4>
<div>
    <table cellpadding="0" cellspacing="0" width="640"  border="1">
        <thead>
        <tr>
            <th>Phone Number</th>
            <th>Operator</th>
            <th>Phone Amount</th>
            <th>For Month</th>
        </tr>
        </thead>
        <tbody cellpadding="0" cellspacing="0" width="100%" align="center" border="1">
        @if(empty($phones) )
            <th colspan="4" class="text-center"><h1>No data</h1></th>
        @else

            @foreach($phones as $monthly)
                <tr>
                    <td>{{$monthly->phone->phoneNumber}}</td>
                    <td>{{$monthly->phone->company->name}}</td>
                    <td>{{number_format($monthly->staff->position->phoneBill)}}</td>
                    <td>{{ \Carbon\Carbon::now()->addMonthsNoOverflow(1)->format('F') }}</td>
                </tr>
            @endforeach

        @endif
        </tbody>
        <tfoot>
        <tr>
            <div  style="display:none;">{{$total = 0}}</div>
            @foreach($phones as $monthly)
            <div style="display:none;">{{$total += $monthly->staff->position->phoneBill}}</div>

            @endforeach
            <th colspan="2">Total</th>
            <th id="total">{{number_format($total)}} </th>

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
            drawCallback: function () {
                var sum = $('#mm').DataTable().column(2).data().sum();
                $('#total').html(sum);

            },
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
