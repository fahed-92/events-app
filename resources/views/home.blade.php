@extends('layouts.app')

@section('content')
<div class="container">


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form id="insertForm">
                    @csrf
{{--                    <div class="form-group">--}}
{{--                        <label for="name">Corner:</label>--}}
{{--                        <input type="text" class="form-control" id="name" name="name" required>--}}
{{--                    </div>--}}

                    <div class="form-group">
                                    <label for="dropdown">Corner:</label>
                                    <select class="form-control" id="dropdown" name="dropdown[]">
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

{{--                    <div class="form-group">--}}
{{--                        <label for="email">Number Of Kids:</label>--}}
{{--                        <input type="text" class="form-control" id="email" name="email" required>--}}
{{--                    </div>--}}

                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </form>
            </div>

            <div class="col-md-12">
                <h3>Table</h3>
                <div id="dataTable"></div>
            </div>
        </div>
    </div>

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // Load table data on page load--}}
{{--            loadTableData();--}}

{{--            // Form submission using AJAX--}}
{{--            $('#insertForm').submit(function (e) {--}}
{{--                e.preventDefault();--}}

{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: '#', // Specify the route to handle the form submission--}}
{{--                    data: $(this).serialize(),--}}
{{--                    success: function (response) {--}}
{{--                        // Reload table data after successful insertion--}}
{{--                        loadTableData();--}}
{{--                        // Clear the form fields--}}
{{--                        $('#insertForm')[0].reset();--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.log(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            // Function to load table data using AJAX--}}
{{--            function loadTableData() {--}}
{{--                $.ajax({--}}
{{--                    type: 'GET',--}}
{{--                    url: '#', // Specify the route to fetch data--}}
{{--                    success: function (response) {--}}
{{--                        $('#dataTable').html(response);--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.log(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container mt-5">--}}
{{--        <form id="myForm">--}}
{{--            <div class="form-group">--}}
{{--                <label for="textField1">Text Field 1:</label>--}}
{{--                <input type="text" class="form-control" id="textField1" name="textField1" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="textField2">Text Field 2:</label>--}}
{{--                <input type="text" class="form-control" id="textField2" name="textField2" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="textField3">Text Field 3:</label>--}}
{{--                <input type="text" class="form-control" id="textField3" name="textField3" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="dropdown">Select Multiple:</label>--}}
{{--                <select multiple class="form-control" id="dropdown" name="dropdown[]">--}}
{{--                    <option value="option1">Option 1</option>--}}
{{--                    <option value="option2">Option 2</option>--}}
{{--                    <option value="option3">Option 3</option>--}}
{{--                    <!-- Add more options as needed -->--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            // Use the 'selectpicker' class if you want Bootstrap's enhanced select styling--}}
{{--            $('#dropdown').selectpicker();--}}

{{--            // Add any additional jQuery functionality or form submission handling here--}}
{{--            $('#myForm').submit(function(e){--}}
{{--                e.preventDefault(); // Prevent the form from submitting normally--}}

{{--                // Perform any form data validation or AJAX submission here--}}
{{--                // For example, you can use AJAX to submit the form data to the server--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</div>
@endsection
