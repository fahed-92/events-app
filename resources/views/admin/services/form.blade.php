{{ csrf_field() }}

<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english title') }}</label>
        <input name="title_en" class="form-control @error('title') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('title','en') : old('title') }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic title') }}</label>
        <input name="title_ar" class="form-control @error('title') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('title','ar') : old('title') }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english description') }}</label>
        <textarea class="form-control @error('description') is-invalid  @enderror editor_en" name="description_en"
            rows="11">{{ isset($row) ? $row->getTranslation('description','en') : old('title') }}</textarea>
        @error('description_en')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic description') }}</label>
        <textarea class="form-control @error('description') is-invalid  @enderror editor_ar" name="description_ar"
            rows="11">{{ isset($row) ? $row->getTranslation('description','ar') : old('title') }}</textarea>
        @error('description_ar')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
@push('scripts')
<script src="{{ asset('backend/assets/build/ckeditor.js') }}"></script>
<script>ClassicEditor
        .create( document.querySelector( '.editor_ar' ), {
            licenseKey: '',
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( error );
        } );
</script>
<script>ClassicEditor
        .create( document.querySelector( '.editor_en' ), {
            licenseKey: '',
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( error );
        } );
</script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@endpush
