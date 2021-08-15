@extends('layouts.home')
@section('form-create')
<div class="col-md-8 d-flex justify-content-center" data-aos="fade-down">
    <div class="card w-75">
        <form action="{{ route('package-management.update', $packageManagements->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="w-100 p-3">
                <div class="form-group">
                    <label for="CustomerName">Customer Name</label>
                    <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="CustomerName" name="customer_name" value="{{ $packageManagements->customer_name }}">
                    @error('customer_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Weight">Weight (Kg)</label>
                    <input type="number" class="form-control @error('weight') is-invalid @enderror" id="Weight" name="weight" value="{{ $packageManagements->weight }}">
                    @error('weight')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="DeliveryAddress">Delivery Address</label>
                    <input type="text" class="form-control @error('delivery_address') is-invalid @enderror" id="DeliveryAddress" name="delivery_address" value="{{ $packageManagements->delivery_address }}">
                    @error('delivery_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="CustomerMobilePhone">Customer Mobile Phone</label>
                    <input type="text" class="form-control @error('customer_mobile_number') is-invalid @enderror" id="CustomerMobilePhone" name="customer_mobile_number" value="{{ $packageManagements->customer_mobile_number  }}">
                    @error('customer_mobile_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Driver">Driver</label>
                    <select class="form-control @error('driver_id') is-invalid @enderror" id="Driver" name="driver_id" value="{{  $packageManagements->driver_id }}">
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                    @error('driver_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="VehicleManagement">Vehicle Management</label>
                    <select class="form-control @error('vehicle_management_id') is-invalid @enderror" id="VehicleManagement" name="vehicle_management_id" value="{{  $packageManagements->vehicle_management_id  }}">
                        @foreach ($vehicleManagements as $vehicleManagement)
                            <option value="{{ $vehicleManagement->id }}">{{ $vehicleManagement->vehicle_number }}</option>
                        @endforeach
                    </select>
                    @error('vehicle_management_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
