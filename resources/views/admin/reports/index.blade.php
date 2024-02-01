@extends('admin.layouts.app')
@section('title', 'تقرير يومي')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            Staff
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-lg-4">
        <div class="alert alert-danger mt-3" id="validationErrors" style="display: none;"></div>
        <form id="myForm">
            @csrf
            <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" class="form-control" id="date" name="date">
                @error('date')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <button type="button" class="btn btn-primary mt-3" id="submitBtn">Submit</button>
        </form>
    </div>

    <div class="col-lg-10 text-center" id="pdf">

    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#submitBtn").click(function () {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.daily-reports.report') }}",
                    data: $("#myForm").serialize(),
                    success: function (response) {

                        console.log(response.data)

                        $("#pdf").empty();
                        // console.log(response)
                        // console.log(response.data)
                        // Insert data into the table dynamically
                        $("#pdf").prepend(response);
                        $("#pdf")[0].reset();
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
@endpush
