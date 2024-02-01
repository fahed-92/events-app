{{ csrf_field() }}

<div class="col-xl-12">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.name') }}</label>
        <input name="title" class="form-control @error('title') is-invalid  @enderror"
            value="{{ isset($row) ? $row->title : old('title') }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-12">
    <label class="block mb-4">
        <label>{{__('messages.photo')}}</label><br>
        <span class="sr-only" >{{__('messages.Choose File')}}</span>
        <input type="file" name="image"
               value="{{ isset($row) ? $row->image1 : old('image') }}"
               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"  />
        @error('image')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="col-xl-12">
    @isset($row)
        <img src="/frontend/assets/img/folder/{{ $row->image }}" height="200" width="300" title="Iframe Example">
    @endisset
    @error('image')
    <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush
