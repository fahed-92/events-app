{{ csrf_field() }}


<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{__('messages.site english name')}}</label>
        <input name="title_en" class="form-control @error('title') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('title','en') : old($row->getTranslation('title','en')) }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{__('messages.site arabic name')}}</label>
        <input name="title_ar" class="form-control @error('title') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('title','ar') : old($row->getTranslation('title','ar')) }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.email') }}</label>
        <input name="email_website" class="form-control @error('email_website') is-invalid  @enderror"
            value="{{ isset($row) ? $row->email_website : old('	email_website') }}">
        @error('email_website')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>


<div class="col-xl-4">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.phone number') }}</label>
        <input name="mobile_website" class="form-control @error('mobile_website') is-invalid  @enderror"
            value="{{ isset($row) ? $row->mobile_website : old('mobile_website') }}">
        @error('mobile_website')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>


<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.tags in english') }}</label>
        <textarea class="form-control @error('keywords') is-invalid  @enderror" name="keywords_en"
            rows="11">{{ isset($row) ? $row->getTranslation('keywords','en') : old($row->getTranslation('keywords','en')) }}</textarea>
        @error('keywords')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.tags in arabic') }}</label>
        <textarea class="form-control @error('keywords') is-invalid  @enderror" name="keywords_ar"
            rows="11">{{ isset($row) ? $row->getTranslation('keywords','ar') : old($row->getTranslation('keywords','ar')) }}</textarea>
        @error('keywords')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.english description') }}</label>
        <textarea class="form-control @error('description') is-invalid  @enderror" name="description_en"
            rows="11">{{ isset($row) ? $row->getTranslation('description','en') : old($row->getTranslation('description','en')) }}</textarea>
        @error('description')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.arabic description') }}</label>
        <textarea class="form-control @error('description') is-invalid  @enderror" name="description_ar"
            rows="11">{{ isset($row) ? $row->getTranslation('description','ar') : old($row->getTranslation('description','ar')) }}</textarea>
        @error('description')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<br>



{{-- Social Media --}}

<div class="col-xl-3">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.instagram') }}</label>
        <input type="text" name="instagram_link" class="form-control @error('instagram_link') is-invalid  @enderror"
            value="{{ isset($row) ? $row->instagram_link : old('instagram_link') }}">
        @error('instagram_link')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
    </div>

<div class="col-xl-3">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.facebook') }}</label>
        <input type="text" name="facebook_link" class="form-control @error('facebook_link') is-invalid  @enderror"
            value="{{ isset($row) ? $row->facebook_link : old('facebook_link') }}">
        @error('facebook_link')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-xl-3">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.twitter') }}</label>
        <input type="text" name="twitter_link" class="form-control @error('twitter_link') is-invalid  @enderror"
            value="{{ isset($row) ? $row->twitter_link : old('twitter_link') }}">
        @error('twitter_link')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-xl-3">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.youtube') }}</label>
        <input type="text" name="youtube_link" class="form-control @error('youtube_link') is-invalid  @enderror"
            value="{{ isset($row) ? $row->youtube_link : old('youtube_link') }}">
        @error('youtube_link')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>

</div>

<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.location in english') }}</label>
        <input name="address_center_en" class="form-control @error('address_center') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('address_center','ar') : old($row->getTranslation('address_center','ar')) }}">
        @error('address_center')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-xl-6">
    <div class="mb-3">
        <label class="form-label">{{ __('messages.location in arabic') }}</label>
        <input name="address_center_ar" class="form-control @error('address_center') is-invalid  @enderror"
            value="{{ isset($row) ? $row->getTranslation('address_center','ar') : old($row->getTranslation('address_center','ar')) }}">
        @error('address_center')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>



