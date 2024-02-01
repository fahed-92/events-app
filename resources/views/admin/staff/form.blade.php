{{ csrf_field() }}

<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">Full name</label>
        <input name="full_name" class="form-control @error('full_name') is-invalid  @enderror"
            value="{{ isset($row) ? $row->full_name: old('full_name') }}">
        @error('full_name')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Salary</label>
        <input name="salary" class="form-control @error('salary') is-invalid  @enderror"
            value="{{ isset($row) ? $row->salary : old('salary') }}">
        @error('salary')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Date Of Join</label>
        <input type="date" name="date_of_joining" class="form-control @error('date_of_joining') is-invalid  @enderror"
            value="{{ isset($row) ? $row->date_of_joining : old('date_of_joining') }}">
        @error('date_of_joining')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Corner</label>
        <input name="corner_id" class="form-control @error('corner_id') is-invalid  @enderror"
            value="{{ isset($row) ? $row->date_of_joining : old('corner_id') }}">
        @error('corner_id')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>

    {{--    noc  --}}
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Upload NOC Picture</label>
            <div class="input-group">
            <span class="input-group-btn">
                <a id="lfmsas" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Upload NOC Picture
                </a>
            </span>
                <input id="thumbnail" class="form-control @error('noc') is-invalid  @enderror" type="file" name="noc"
                       value="{{ isset($row) ? $row->noc : old('noc') }}">
            </div>
            @error('noc')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">View NOC pic</label>
            <div id="holder" style="max-height:70px; overflow: hidden; object-fit: contain;">
                @if(isset($row))
                    <img src="{{ $row->noc }}" class="img-thumbnail img-fluid" width="70" alt="">
                @endif
            </div>
        </div>
    </div>

{{--    id pic --}}
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Upload ID Pic</label>
            <div class="input-group">
            <span class="input-group-btn">
                <a id="lfmoo" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> ID Pic
                </a>
            </span>
                <input id="thumbnail" class="form-control @error('id_pic') is-invalid  @enderror" type="file" name="id_pic"
                       value="{{ isset($row) ? $row->id_pic : old('id_pic') }}">
            </div>
            @error('id_pic')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">View ID Picture</label>
            <div id="holder" style="max-height:70px; overflow: hidden; object-fit: contain;">
                @if(isset($row))
                    <img src="{{ $row->image }}" class="img-thumbnail img-fluid" width="70" alt="">
                @endif
            </div>
        </div>
    </div>

{{--    cv --}}
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Upload Cv</label>
            <div class="input-group">
            <span class="input-group-btn">
                <a id="lfmsasa" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i>Select Cv
                </a>
            </span>
                <input id="thumbnail212" class="form-control @error('cv') is-invalid  @enderror" type="file" name="cv"
                       value="{{ isset($row) ? $row->cv : old('cv') }}">
            </div>
            @error('cv')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">View Cv</label>
            <div id="holder" style="max-height:70px; overflow: hidden; object-fit: contain;">
                @if(isset($row))
                    <iframe src="{{ $row->cv }}" class="img-thumbnail img-fluid" width="70" alt="">
                @endif
            </div>
        </div>
    </div>
</div>
