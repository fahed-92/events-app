<!DOCTYPE html>
<html>
<head>
    <title>Daily Report</title>
</head>
<body>
{{--    <img src="{{ asset('admin') }}/assets/images/Spacetoon_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">--}}


<p class="text-end"><strong>Cityland Toy Festival Report</strong></p>
<p class="text-end">Day  &nbsp; <strong>{{ $dayCount }}</strong> : <strong>{{ $date }}</strong></p>

@foreach($data as $info)

    <p class="text-end"><strong>{{ $info['corner_id'] }}</strong></p>
    <p class="text-end">Total No. of kids:<strong> {{ $info['no_Kids'] }}</strong></p>
    <p class="text-end">Number of staff: <strong>{{ $info['no_staff'] }}</strong></p>
    <p class="text-end">Most liked activity :<strong> {{ $info['liked_activity'] }}</strong></p>
    <p class="text-end">Daily Maintenance:<strong> None</strong></p>
    <p class="text-end">Photos and videos:</p>
    <p class="text-end"><strong><a TARGET="_blank">{{ $info['photos_link'] }}</a></strong></p>
    <div class="line text-end">_________________________________</div>@endforeach
<br>

<p style="text-align: center;"></p>
</body>
</html>
