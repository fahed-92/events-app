<div class="card content">
    <div class="card-header bg-primary text-black text">
        <h5>Reports For :"{{ $date }}"</h5>

    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>Cityland Toy Festival Report</strong></h5>
        <p class="text-end">Day : <strong>{{ $dayCount }}</strong> : <strong>{{ $date }}</strong></p>

        @foreach($dailyInfoReports as $dailyInfoReport)
            <p class="text-end"><strong>{{ $dailyInfoReport->corner_id }}</strong></p>
            <p class="text-end">Total No. of kids:<strong> {{ $dailyInfoReport->no_Kids }}</strong></p>
            <p class="text-end">Number of staff: <strong>{{ $dailyInfoReport->no_staff }}</strong></p>
            <p class="text-end">Most liked activity :<strong> {{ $dailyInfoReport->liked_activity }}</strong></p>
            <p class="text-end">Daily Maintenance:<strong> None</strong></p>
            <p class="text-end">Photos and videos: <strong><a href="{{$dailyInfoReport->photos_link}}">Press Here To Show Photos</a></strong></p>
            <div class="line text-end">_________________________________</div>
        @endforeach

        <a href="{{ route('admin.daily-reports.report.pdf',[$date]) }}" class="btn btn-secondary mt-5">Generate PDF</a>
    </div>
</div>


