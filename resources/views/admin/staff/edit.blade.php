@extends('admin.layouts.app')
@section('title', 'تعديل كورنر')
@section('content')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Corner</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Corner</h4>
                    <p class="card-title-desc">Edit Corner</p>
                    <form class="form row" method="POST" enctype="multipart/form-data" action="{{ route('admin.staff.update', $row->id) }}">
                        @method('PUT')
                        @include('admin.staff.form')
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <button class="btn btn-primary waves-effect btn-label waves-light" style="background-color: #175f3f;"><i class="bx bx-save label-icon"></i>
                                    Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
