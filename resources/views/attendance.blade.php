<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>SpaceToon</title>
{{--    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/Spacetoon_logo.png">--}}
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="{{ asset('admin') }}/assets/images/Spacetoon_logo.png" width="30"
                                          height="30" class="d-inline-block align-top" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-right" id="navbarText">
        <ul class="navbar-nav mr-auto">
            @if (Route::has('login'))
                @auth
{{--                    @if(\Illuminate\Support\Facades\Auth()->is_admin === 1)--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/home') }}" class="nav-link">admin</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                    <li class="nav-item active">
{{--                        <a href="{{ url('/home') }}" class="nav-link">Home</a>--}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                @else
                    <li class="nav-item active">

                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        <li class="nav-item active">

                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>

                    @endif
                @endauth
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('daily.index') }}">Daily Informations<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('att.index') }}">Attendance <span
                        class="sr-only">(current)</span></a>
            </li>


        </ul>
    </div>
</nav>
<div class="row justify-content-center text-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Daily Attendance') }}</div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="alert alert-danger mt-3" id="validationErrors" style="display: none;"></div>
                        <form id="myForm">
                            @csrf
                            <div class="form-group">
                                <label class="font" for="corner"><span class="">Corner:</span></label>
                                <select class="form-control" id="corner" name="corner">
                                    <option value="{{ $corner->id }}">{{ $corner->name }}</option>
                                </select>
                                @error('corner')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="staff">Staff</label>
                                <select class="form-control" id="staff" name="staff[]" multiple>
                                    @foreach($corner->staff as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->full_name }}</option>
                                    @endforeach
                                </select>
                                @error('staff')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="staff">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="present">Present</option>
                                    <option value="off">OFF</option>
                                    <option value="absent">absent</option>
                                </select>
                                @error('staff')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Enter Date">
                                @error('date')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="checkIn">check-In</label>
                                <input type="time" class="form-control" id="checkIn" name="checkIn"
                                       placeholder="Enter checkIn">
                                @error('checkIn')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="checkOut">check-Out</label>
                                <input type="time" class="form-control" id="checkOut" name="checkOut"
                                       placeholder="Enter checkOut">
                                @error('checkOut')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <div class="mt-3">
                            <table class="table border-3" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Corner</th>
                                    <th>Date</th>
                                    <th>Staff</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($atts as $att)
                                    <tr>
                                        <td>{{$corner->name}}</td>
                                        <td>{{$att->date}}</td>
                                        <td>{{$att->staff_id}}</td>
                                        <td>{{$att->check_in}}</td>
                                        <td>{{$att->check_out}}</td>
                                    </tr>
                                @endforeach
                                <!-- Data will be inserted here dynamically -->
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-sm">
                            {!! $atts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    {{--$(document).ready(function () {--}}
    {{--    $("#submitBtn").click(function () {--}}
    {{--        $.ajax({--}}
    {{--            type: "POST",--}}
    {{--            url: "{{ route('att.store') }}", // Use Laravel named route--}}
    {{--            data: $("#myForm").serialize(),--}}
    {{--            success: function (response) {--}}
    {{--                // Insert data into the table dynamically--}}
    {{--                $("#dataTable tbody").prepend(response);--}}
    {{--                $("#myForm")[0].reset();--}}
    {{--                // Hide validation errors--}}
    {{--                $("#validationErrors").hide().empty();--}}
    {{--            },--}}
    {{--            error: function (response) {--}}
    {{--                // Display validation errors--}}
    {{--                var errors = response.responseJSON.errors;--}}
    {{--                var errorHtml = '<ul>';--}}
    {{--                $.each(errors, function (key, value) {--}}
    {{--                    errorHtml += '<li>' + value + '</li>';--}}
    {{--                });--}}
    {{--                errorHtml += '</ul>';--}}
    {{--                $("#validationErrors").html(errorHtml).show();--}}
    {{--            }--}}
    {{--        });--}}
    {{--    });--}}
    {{--});--}}

    $(document).ready(function () {
        $("#submitBtn").click(function () {
            var formData = new FormData($('#myForm')[0]); // Create a FormData object to handle file uploads and multiple selects

            $.ajax({
                type: "POST",
                url: "{{ route('att.store') }}", // Use Laravel named route
                data: formData,
                contentType: false, // Prevent jQuery from setting the Content-Type
                processData: false, // Prevent jQuery from processing the data
                success: function (response) {
                    // Insert data into the table dynamically
                    // console.log(response)
                    $("#dataTable tbody").prepend(response);
                    $("#myForm")[0].reset();
                    // Hide validation errors
                    $("#validationErrors").hide().empty();
                },
                error: function (response) {
                    // Display validation errors
                    var errors = response.responseJSON.errors;
                    var errorHtml = '<ul>';
                    $.each(errors, function (key, value) {
                        errorHtml += '<li>' + value + '</li>';
                    });
                    errorHtml += '</ul>';
                    $("#validationErrors").html(errorHtml).show();
                }
            });
        });
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
