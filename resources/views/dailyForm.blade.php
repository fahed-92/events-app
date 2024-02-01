<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>SpaceToon</title>
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/Spacetoon_logo.png">

</head>
<body>
{{--@include('admin.layouts.alerts')--}}

{{--<nav class="navbar navbar-dark bg-dark">--}}
{{--    <!-- Navbar content -->--}}
{{--    <a class="navbar-brand" href="#">Navbar w/ text</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
{{--    <div class="collapse navbar-collapse" id="navbarText">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Features</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Pricing</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <span class="navbar-text">--}}
{{--      Navbar text with an inline element--}}
{{--    </span>--}}
{{--    </div>--}}
{{--</nav>--}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="{{ asset('admin') }}/assets/images/Spacetoon_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-right" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('daily.index') }}">Daily Informations<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('att.index') }}">Attendance <span class="sr-only">(current)</span></a>
            </li>
        </ul>
{{--        <span class="navbar-text">--}}
{{--      Navbar text with an inline element--}}
{{--    </span>--}}
    </div>
</nav>

<div class="row justify-content-center text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daily Report') }}</div>

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
                                        <label for="numberOfKids">Number of Kids:</label>
                                        <input type="number" class="form-control" id="numberOfKids" name="numberOfKids" placeholder="Enter number of kids" @error('numberOfKids') is-invalid  @enderror">
                                        @error('numberOfKids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="numberOfStaff">Number of Staff:</label>
                                        <input type="number" class="form-control" id="numberOfStaff" name="numberOfStaff" placeholder="Enter number of staff">
                                        @error('numberOfStaff')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mostLikedActivity">Most Liked Activity:</label>
                                        <input type="text" class="form-control" id="mostLikedActivity" name="mostLikedActivity" placeholder="Enter most liked activity">
                                        @error('mostLikedActivity')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="daily_maintenance">Daily Maintenance:</label>
                                        <input type="text" class="form-control" id="daily_maintenance" name="daily_maintenance" placeholder="Enter daily maintenance">
                                        @error('daily_maintenance')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="linkForPhotosAndVideos">Link for Photos and Videos:</label>
                                        <input type="text" class="form-control" id="linkForPhotosAndVideos" name="linkForPhotosAndVideos" placeholder="Enter link for photos and videos">
                                        @error('linkForPhotosAndVideos')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                        @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>

                                    <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                                </form>
                            </div>
                            <div class="col-lg-8">
                                <div class="mt-3">
{{--                                    <h3 class="text-center">Inserted Data</h3>--}}
                                    <table class="table border-3" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>Corner</th>
                                            <th>Number of Kids</th>
                                            <th>Number of Staff</th>
                                            <th>Most Liked Activity</th>
                                            <th>Daily Maintenance</th>
                                            <th>Link for Photos and Videos</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dailyInfos as $dailyInfo)
                                            <tr>
                                                <td>{{$corner->name}}</td>
                                                <td>{{$dailyInfo->no_Kids}}</td>
                                                <td>{{$dailyInfo->no_staff}}</td>
                                                <td>{{$dailyInfo->liked_activity}}</td>
                                                <td>{{$dailyInfo->daily_maintenance}}</td>
                                                <td>{{$dailyInfo->photos_link}}</td>
                                                <td>{{$dailyInfo->date}}</td>
                                            </tr>
                                        @endforeach

                                        <!-- Data will be inserted here dynamically -->

                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-sm">
                                    {!! $dailyInfos->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<script>
    $(document).ready(function() {
        $("#submitBtn").click(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('dailyInfo.store') }}",
                data: $("#myForm").serialize(),
                success: function(response) {
                    // Insert data into the table dynamically
                    $("#dataTable tbody").prepend(response);
                    $("#myForm")[0].reset();
                    // Hide validation errors
                    $("#validationErrors").hide().empty();
                },
                error: function(response) {
                    // Display validation errors
                    var errors = response.responseJSON.errors;
                    var errorHtml = '<ul>';
                    $.each(errors, function(key, value) {
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
