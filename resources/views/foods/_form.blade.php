@csrf
<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Makanan" value="{{ old('name', $food->name ?? '') }}">
        @error('name')
            <code>{{ $message }}</code>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" id="type" class="form-control">
            @foreach ($food_types as $type)
                <option value="{{ $type['slug'] }}" {{ old('type', $food->type ?? '') == $type['slug'] ? 'selected' : '' }}>{{ $type['name'] }}</option>
            @endforeach
        </select>
        @error('type')
            <code>{{ $message }}</code>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Harga" value="{{ old('price', $food->price ?? '0') }}">
        @error('price')
            <code>{{ $message }}</code>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status') || (isset($food) && $food->status == 'ready') ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Ready</label>
        </div>
        @error('status')
            <code>{{ $message }}</code>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-block btn-primary">Simpan</button>
    </div>

</div>
