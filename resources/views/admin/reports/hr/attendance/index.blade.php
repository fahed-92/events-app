@extends('admin.layouts.app')
@section('title', 'تقرير الموارد البشرية')
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
                            Reports
                        </li>
                        <li class="breadcrumb-item active">
                            HR Report
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
            {{--            Staff Field           --}}
            <div class="form-group">
                <div class="form-group">
                    <label class="mt-2" for="staff">Search By Name</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search">
                </div>
                <label class="mt-2" for="staff">Staff</label>
                <select class="form-control" id="staff" name="staff">
                    @foreach($staff as $person)
                        <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                    @endforeach
                </select>
                @error('staff')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="button" class="btn btn-primary mt-3" id="submitBtn">Submit</button>
        </form>
    </div>

    <div class="col-lg-10 text-center" id="pdf">
        <div class="col-lg-8">
            <div class="mt-3">
                <table class="table border-3" id="dataTable">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Name</td>
                        <td>Status</td>
                        <td>Check In</td>
                        <td>Check In</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="pagination-sm">
{{--                {!! $hrReports->links() !!}--}}
            </div>
        </div>
        @endsection
        @push('scripts')
            <script>
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $("#submitBtn").click(function () {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('admin.hr.report') }}",
                            data: $("#myForm").serialize(),
                            success: function (response) {

                                $("#dataTable tbody").empty();
                                console.log(response)
                                // console.log(response.data)
                                // Insert data into the table dynamically
                                $("#dataTable tbody").prepend(response);
                                $("#myForm")[0].reset();
                                // Hide validation errors
                                $("#validationErrors").hide().empty();
                            },
                            error: function (response) {
                                // Display validation errors
                                var errors = response.responseJSON.errors;
                                var errorHtml = '<ul>';
                                $.each(errors, function (key,value) {
                                    errorHtml += '<li>' + value + '</li>';
                                });
                                errorHtml += '</ul>';
                                $("#validationErrors").html(errorHtml).show();
                            }
                        });
                    });
                });
            </script>
            <script>
                $(document).ready(function () {
                    // Fetch dropdown values on page load
                    $.get('/admin/dropdown/values', function (data) {
                        updateDropdown(data);
                    });

                    // Handle search on input change
                    $('#searchInput').on('input', function () {
                        var searchTerm = $(this).val();
                        $.post('/admin/dropdown/search', {searchTerm: searchTerm}, function (data) {
                            updateDropdown(data);
                        });
                    });


                    function updateDropdown(data) {
                        var dropdown = $('#staff');
                        dropdown.empty();

                        $.each(data, function (id, name) {
                            dropdown.append($('<option></option>').attr('value', id).text(name));
                        });
                    }
                });
            </script>


            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endpush
