{{ csrf_field() }}

<div class="row">
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Item</label>
            <input name="item" class="form-control @error('item') is-invalid  @enderror"
                   value="{{ isset($row) ? $row->item: old('item') }}">
            @error('item')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity" class="form-control @error('quantity') is-invalid  @enderror"
                   value="{{ isset($row) ? $row->quantity : old('quantity') }}">
            @error('quantity')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid  @enderror"
                   value="{{ isset($row) ? $row->price : old('price') }}">
            @error('price')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3">
            <label class="form-label">Expire</label>
            <input type="date" name="expire" class="form-control @error('expire') is-invalid  @enderror"
                   value="{{ isset($row) ? $row->expire : old('expire') }}">
            @error('expire')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>
</div>
