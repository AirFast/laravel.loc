@csrf

<div class="form-group row">
    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.form.number') }}</label>

    <div class="col-md-6">
        <input id="number" type="number" min="1"
               class="form-control @error('number') is-invalid @enderror" name="number"
               value="{{ old('number') ?? $territory->number }}" required autofocus>

        @error('number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.address') }}</label>

    <div class="col-md-6">
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name') ?? $territory->name }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="map-lat-lng" class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.form.coordinates') }}</label>

    <div class="col-md-6">
        <input id="map-lat-lng" type="text"
               class="form-control @error('map_lat_lng') is-invalid @enderror" name="map_lat_lng"
               value="{{ old('map_lat_lng') ?? $territory->map_lat_lng }}" required>

        @error('map_lat_lng')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.form.description') }}</label>

    <div class="col-md-6">
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') ?? $territory->description }}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="status"
           class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.status.title') }}</label>

    <div class="col-md-6">
        <select id="status" class="form-control @error('status') is-invalid @enderror"
                name="status" required>

            @foreach($territory->statusOptions() as $statusOptionKey => $statusOptionValue)
                <option value="{{ $statusOptionKey }}" {{ $territory->status == $statusOptionValue ? 'selected' : '' }}>{{ __('adminpanel.territories.status.' . $statusOptionValue) }}</option>
            @endforeach

        </select>

        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="user"
           class="col-md-4 col-form-label text-md-right">{{ __('adminpanel.territories.form.assign') }}</label>

    <div class="col-md-6">
        <select id="user" class="form-control @error('user_id') is-invalid @enderror"
                name="user_id"
                value="{{ old('user_id') ?? ''  }}" required>

            <option value="0">{{ __('adminpanel.territories.form.assign-nobody') }}</option>
            @foreach($users as $user)
                <option
                    value="{{ $user->id }}" {{ $territory->user_id == $user->id || old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach

        </select>

        @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
