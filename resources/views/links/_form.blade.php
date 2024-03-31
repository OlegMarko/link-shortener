<form method="post" action="{{ route('links.store') }}">
    @csrf

    <div class="form-group">
        <label for="original_url">Original URL:</label>
        <input type="text" class="form-control @error('original_url') is-invalid @enderror"
               id="original_url" name="original_url" value="{{ old('original_url') }}" required>

        @error('original_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label for="max_count">Max Count:</label>
        <input type="number" class="form-control @error('max_count') is-invalid @enderror"
               id="max_count" name="max_count" value="{{ old('max_count') }}" required>

        @error('max_count')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span>Expiration Time (max 24h):</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="expiration_hours">Hours:</label>
                <div class="input-group">
                    <input type="number" class="form-control @error('expiration_hours') is-invalid @enderror"
                           id="expiration_hours" name="expiration_hours" value="{{ old('expiration_hours') }}"
                           placeholder="Hours" pattern="[0-9]{1,2}" min="0" max="24">

                    @error('expiration_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="expiration_minutes">Minutes:</label>
                <div class="input-group">
                    <input type="number" class="form-control @error('expiration_minutes') is-invalid @enderror"
                           id="expiration_minutes" name="expiration_minutes" value="{{ old('expiration_minutes') }}"
                           placeholder="Minutes" pattern="[0-9]{1,2}" min="0" max="59">

                    @error('expiration_minutes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Shorten</button>
</form>
