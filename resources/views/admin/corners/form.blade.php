{{ csrf_field() }}

<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">name</label>
        <input name="name" class="form-control @error('name') is-invalid  @enderror"
            value="{{ isset($row) ? $row->name: old('name') }}">
        @error('name')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Number Of Activities</label>
        <input name="no_of_activity" class="form-control @error('no_of_activity') is-invalid  @enderror"
            value="{{ isset($row) ? $row->no_of_activity : old('no_of_activity') }}">
        @error('no_of_activity')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
@push('scripts')
<script src="{{ asset('admin/assets/build/ckeditor.js') }}"></script>
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
