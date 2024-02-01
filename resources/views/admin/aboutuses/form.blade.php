{{ csrf_field() }}

{{--about us section--}}
<div class="col-xl-12">
    <div class="mb-3" style="background-color: #175f3f;">
        <h4 class="card-title py-3 text-center text-white fs-14 shadow-sm" >{{ __('messages.About US') }}</h4>
    </div>
</div>
{{--about us title--}}
<div class="col-xl-6">
    <div class="mb-3" >
        <label class="form-label">{{ __('messages.english title') }}</label>
        <input name="title_aboutus_en" class="form-control @error('title_aboutus') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_aboutus','en') : old($row->getTranslation('title_aboutus','en')) }}">
        @error('title_aboutus')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic title') }}</label>
        <input name="title_aboutus_ar" class="form-control @error('title_aboutus') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_aboutus','ar') : old($row->getTranslation('title_aboutus','ar')) }}">
        @error('title_aboutus')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--about us desc--}}
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english description') }}</label>
        <textarea class="form-control @error('desc_aboutus') is-invalid  @enderror editor_en" name="desc_aboutus_en"
                  rows="11">
            {{ isset($row) ? $row->getTranslation('desc_aboutus','en') : old($row->getTranslation('desc_aboutus','en')) }}
        </textarea>
        @error('desc_aboutus')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic description') }}</label>
        <textarea class="form-control @error('desc_aboutus') is-invalid  @enderror editor_ar" name="desc_aboutus_ar"
                  rows="11">
            {{ isset($row) ? $row->getTranslation('desc_aboutus','ar') : old($row->getTranslation('desc_aboutus','ar')) }}
        </textarea>
        @error('desc_aboutus')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>


{{--Our mission section--}}
<div class="col-xl-12">
    <div class="mb-3 mt-3" style="background-color: #175f3f;">
        <h4 class="card-title  py-3 text-center text-white fs-14 shadow-sm">{{ __('messages.Our mission') }}</h4>
    </div>
</div>
{{--Our mission title--}}
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english title') }}</label>
        <input name="title_our_mission_en" class="form-control @error('title_our_mission') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_our_mission','en') : old($row->getTranslation('title_our_mission','en')) }}">
        @error('title_our_mission')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic title') }}</label>
        <input name="title_our_mission_ar" class="form-control @error('title_our_mission') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_our_mission','ar') : old($row->getTranslation('title_our_mission','ar')) }}">
        @error('title_our_mission')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--Our mission desc--}}
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english description') }}</label>
        <textarea class="form-control @error('desc_our_mission') is-invalid  @enderror editor2_en"
                  name="desc_our_mission_en"
                  rows="11">
            {{ isset($row) ? $row->getTranslation('desc_our_mission','en') : old($row->getTranslation('desc_our_mission','en')) }}
        </textarea>
        @error('desc_our_mission')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic description') }}</label>
        <textarea class="form-control @error('desc_our_mission') is-invalid  @enderror editor2_ar"
                  name="desc_our_mission_ar"
                  rows="11">
            {{ isset($row) ? $row->getTranslation('desc_our_mission','ar') : old($row->getTranslation('desc_our_mission',['ar'])) }}
        </textarea>
        @error('desc_our_mission')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>


{{--General Our orientation--}}
<div class="col-xl-12">
    <div class="mb-3 mt-3" style="background-color: #175f3f;">
        <h4 class="card-title py-3 text-center text-white fs-14 shadow-sm">{{ __('messages.Our orientation') }}</h4>
    </div>
</div>
{{--General Manager title--}}
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english title') }}</label>
        <input name="title_admin_word_en" class="form-control @error('title_admin_word') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_admin_word','en') : old($row->getTranslation('title_admin_word','en')) }}">
        @error('title_admin_word')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic title') }}</label>
        <input name="title_admin_word_ar" class="form-control @error('title_admin_word') is-invalid  @enderror"
               value="{{ isset($row) ? $row->getTranslation('title_admin_word','ar') : old($row->getTranslation('title_admin_word',['ar'])) }}">
        @error('title_admin_word')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
{{--General Manager desc--}}
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english description') }}</label>
        <textarea class="form-control @error('desc_admin_word') is-invalid   @enderror editor3_en"
                  name="desc_admin_word_en"
                  rows="11">
            {{ isset($row) ? $row->getTranslation('desc_admin_word','en') : old($row->getTranslation('desc_admin_word','en')) }}
            </textarea>
        @error('desc_admin_word')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic description') }}</label>
        <textarea class="form-control  @error('desc_admin_word') is-invalid  @enderror editor3_ar"
                  name="desc_admin_word_ar" rows="11">
            {{ isset($row) ? $row->getTranslation('desc_admin_word','ar') : old('desc_admin_word') }}
        </textarea>
        @error('desc_admin_word')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
@push('scripts')
    <script src="{{ asset('backend/assets/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('.editor_ar'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor.create(document.querySelector('.editor_en'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>
    <script>ClassicEditor.create(document.querySelector('.editor2_ar'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor.create(document.querySelector('.editor2_en'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor.create(document.querySelector('.editor3_ar'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor.create(document.querySelector('.editor3_en'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });
    </script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js">

    </script>
{{--    <script>--}}
{{--        $('#lfm1').filemanager('image');--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#lfm2').filemanager('image');--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $('#lfm3').filemanager('image');--}}
{{--    </script>--}}

@endpush

