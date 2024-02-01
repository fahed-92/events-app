
<!-- Data will be inserted here dynamically -->
@foreach($hrReports as $hrReport)
    <tr>
        <td>{{ $hrReport->date }}</td>
        <td>{{ $hrReport->staff_id }}</td>
        <td>{{ $hrReport->status }}</td>
        <td>{{ $hrReport->check_in }}</td>
        <td>{{ $hrReport->check_out }}</td>
    </tr>
@endforeach

