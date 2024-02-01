<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
</head>
<body>
<p class="text-end"><strong>Cityland Toy Festival Report</strong></p>
{{--<p class="text-end">Day  &nbsp; <strong>{{ $dayCount }}</strong> : <strong>{{ $date }}</strong></p>--}}

@foreach($data as $info)

    <p class="text-end">Date :<strong>{{ $info['date'] }}</strong></p>
    <p class="text-end">Staff :<strong> {{ $info['staff_id'] }}</strong></p>
    <p class="text-end">Status : <strong>{{ $info['status'] }}</strong></p>
    <p class="text-end">check in :<strong>{{ $info['check_in'] }}</strong></p>
    <p class="text-end">Check_out:<strong>{{ $info['check_out'] }}</strong></p>

    <div class="line text-end">_________________________________</div>@endforeach
<br>

<p style="text-align: center;"></p>
</body>
</html>
