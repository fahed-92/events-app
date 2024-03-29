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
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </ul>
{{--        <span class="navbar-text">--}}
{{--      Navbar text with an inline element--}}
{{--    </span>--}}
    </div>
</nav>

<div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('Daily Report') }}</div>

                    <div class="card-body">
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
                                    {{--      Date field   --}}
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                        @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    {{--        Show 1     --}}
                                    <div class="form-group">
                                        <label for="first_show_name">First Show:</label>
                                        <input type="text" class="form-control mt-2" id="first_show_name" name="first_show_name" placeholder="Enter first show name" @error('first_show_name') is-invalid  @enderror">
                                        @error('first_show_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control mt-2" id="first_show_kids" name="first_show_kids" placeholder="Enter number of kids" @error('first_show_kids') is-invalid  @enderror">
                                        @error('first_show_kids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="time" class="form-control mt-2" id="time" name="time" placeholder="Enter time" @error('time') is-invalid  @enderror">
                                        @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--        Show 2    --}}
                                    <div class="form-group">
                                        <label for="second_show_name">Second Show:</label>
                                        <input type="text" class="form-control mt-2" id="second_show_name" name="second_show_name" placeholder="Enter Second Show Name" @error('second_show_name') is-invalid  @enderror">
                                        @error('second_show_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control mt-2" id="second_show_kids" name="second_show_kids" placeholder="Enter Number Of Kids" @error('second_show_kids') is-invalid  @enderror">
                                        @error('second_show_kids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="time" class="form-control mt-2" id="time" name="time" placeholder="Enter time" @error('time') is-invalid  @enderror">
                                        @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    {{--        Show 3     --}}
                                    <div class="form-group">
                                        <label for="third_show">Third Show:</label>
                                        <input type="text" class="form-control mt-2" id="third_show_name" name="third_show_name" placeholder="Enter Third Show Name" @error('first_show_name') is-invalid  @enderror">
                                        @error('third_show_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control mt-2" id="third_show_kids" name="third_show_kids" placeholder="Enter Number Of Kids" @error('first_show_kids') is-invalid  @enderror">
                                        @error('third_show_kids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="time" class="form-control mt-2" id="time" name="time" placeholder="Enter time" @error('time') is-invalid  @enderror">
                                        @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--        Show 4     --}}
                                    <div class="form-group">
                                        <label for="fourth_show">Fourth Show:</label>
                                        <input type="text" class="form-control mt-2" id="fourth_show_name" name="fourth_show_name" placeholder="Enter Fourth Show Name" @error('fourth_show_name') is-invalid  @enderror">
                                        @error('fourth_show_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control mt-2" id="fourth_show_kids" name="fourth_show_kids" placeholder="Enter Number Of Kids" @error('fourth_show_kids') is-invalid  @enderror">
                                        @error('fourth_show_kids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="time" class="form-control mt-2" id="time" name="time" placeholder="Enter time" @error('time') is-invalid  @enderror">
                                        @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--        Show 5     --}}
                                    <div class="form-group">
                                        <label for="fifth_show_name">Fifth Show:</label>
                                        <input type="text" class="form-control mt-2" id="fifth_show_name" name="fifth_show_name" placeholder="Enter Fifth Show Name" @error('fifth_show_name') is-invalid  @enderror">
                                        @error('fifth_show_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control mt-2" id="fifth_show_kids" name="fifth_show_kids" placeholder="Enter Number Of Kids" @error('fifth_show_kids') is-invalid  @enderror">
                                        @error('fifth_show_kids')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="time" class="form-control mt-2" id="time" name="time" placeholder="Enter time" @error('time') is-invalid  @enderror">
                                        @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Number of Supervisors                     --}}
                                    <div class="form-group">
                                        <label for="no_supervisors">Number of Supervisors:</label>
                                        <input type="number" class="form-control" id="no_supervisors" name="no_supervisors" placeholder="Enter Number Of Supervisors">
                                        @error('no_supervisors')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Number of Wardrobe                        --}}
                                    <div class="form-group">
                                        <label for="no_wardrobe">Number of Wardrobe:</label>
                                        <input type="number" class="form-control" id="no_wardrobe" name="no_wardrobe" placeholder="Enter Number Of Wardrobe">
                                        @error('no_wardrobe')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Number of Performers                      --}}
                                    <div class="form-group">
                                        <label for="no_performers">Number of Performers:</label>
                                        <input type="number" class="form-control" id="no_performers" name="no_performers" placeholder="Enter Number Of Performers">
                                        @error('no_performers')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Number of Extra Performers                --}}
                                    <div class="form-group">
                                        <label for="no_extra_performers">Number of Extra Performers:</label>
                                        <input type="number" class="form-control" id="no_extra_performers" name="no_extra_performers" placeholder="Enter Number Of Extra Performers">
                                        @error('no_extra_performers')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Review and comment                        --}}
                                    <div class="form-group">
                                        <label for="comments">Reviews && Comments:</label>
                                        <textarea class="form-control comments" name="comments"
                                                  rows="11"></textarea>
                                        @error('comments')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{--                  Review and Photos and Videos              --}}
                                    <div class="form-group">
                                        <label for="linkForPhotosAndVideos">Link for Photos and Videos:</label>
                                        <input type="text" class="form-control" id="linkForPhotosAndVideos" name="linkForPhotosAndVideos" placeholder="Enter link for photos and videos">
                                        @error('linkForPhotosAndVideos')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
{{--                                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>--}}
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
                                            <th>Area</th>
                                            <th>Date</th>
                                            <th>Number of Supervisors</th>
                                            <th>Number of Wardrobe</th>
                                            <th>Number of Performers</th>
                                            <th>Number of Extra Performers</th>
                                            <th>Comments</th>
                                            <th>Link for Photos and Videos</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dailyInfos as $dailyInfo)
                                            <tr>
                                                <td>{{$corner->name}}</td>
                                                <td>{{$dailyInfo->date}}</td>
                                                <td>{{$dailyInfo->no_supervisors}}</td>
                                                <td>{{$dailyInfo->no_wardrobe}}</td>
                                                <td>{{$dailyInfo->no_performers}}</td>
                                                <td>{{$dailyInfo->no_extra_performers}}</td>
                                                <td>{{$dailyInfo->comments}}</td>
                                                <td>{{$dailyInfo->photos_link}}</td>
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
{{--<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>--}}
{{--<script src="/node_modules/ckeditor4/ckeditor.js"></script>--}}
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('comments');
</script>

<script>
    $(document).ready(function() {
        $("#submitBtn").click(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('mascot.dailyInfo.store') }}",
                data: $("#myForm").serialize(),
                success: function(response) {
                    console.log(response);
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
