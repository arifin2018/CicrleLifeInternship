@extends('layouts.home')
{{-- id	driver_id	vehicle_number	color	picture	created_at	updated_at --}}
@section('form-create')
<div class="col-md-8 d-flex justify-content-center" data-aos="fade-down">
    <div class="card w-75">
        <form action="{{ route('vehicle-management.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-100 p-3">
                <div class="form-group">
                    <label for="Driver">Driver</label>
                    <select class="form-control @error('driver_id') is-invalid @enderror" id="Driver" name="driver_id" value="{{ old('driver_id') }}">
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                    @error('driver_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="vehicle_number">Vehicle Number</label>
                    <input type="text" class="form-control @error('vehicle_number') is-invalid @enderror" value="{{ old('vehicle_number') }}" id="vehicle_number" name="vehicle_number">
                    @error('vehicle_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}" id="color" name="color">
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" value="{{ old('picture') }}">
                    @error('picture')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
