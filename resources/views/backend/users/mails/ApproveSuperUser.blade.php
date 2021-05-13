<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
</head>
<body>
Request ID : {{$data['Request_id']}}
Request Name : {{$data['Request']}}
Branch : {{ $data['Branch'] }}
<br>
Approved By : {{ $data['Approved'] }}

<br>

Link  : {{$data['link']}}


<h3 class="text-danger">Your Request has been done</h3>
</body>
</html>
