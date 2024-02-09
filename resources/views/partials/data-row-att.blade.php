@foreach($data as $info)
    <tr>
        <td>{{ $corner->name}}</td>
        <td>{{ $info->date }}</td>
        <td>{{ $info->staff_id }}</td>
        <td>{{ $info->check_in }}</td>
        <td>{{ $info->check_out }}</td>
    </tr>
@endforeach
