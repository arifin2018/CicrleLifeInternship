@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 justify-content-start" data-aos="fade-down" data-aos-duration="500">
            @if(Auth::user()->roles == 'administrator')
            {{-- Driver --}}
            <div class="my-3">
                <h5 class="text-dark text-bold">Driver</h5>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('driver') }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">List</li>
                        </a>
                    </ul>
                </div>
            </div>

            {{-- Vehicle management --}}
            <div class="my-3">
                <h5 class="text-dark text-bold">Vehicle management</h5>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('vehicle-management.index') }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">List</li>
                        </a>
                        <a href="{{ route('vehicle-management.create') }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">Create</li>
                        </a>
                    </ul>
                </div>
            </div>

            {{-- Package management --}}
            <div class="mb-3">
                <h5 class="text-dark text-bold">Package management</h5>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('package-management.index') }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">List</li>
                        </a>
                        <a href="{{ route('package-management.create') }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">Create</li>
                        </a>
                    </ul>
                </div>
            </div>
            @else

            {{-- Roles === Driver --}}
            {{-- Task Driver --}}
            <div class="my-3">
                <h5 class="text-dark text-bold">Your Task</h5>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('driver-detail',Auth::user()->id) }}" class="text-decoration-none text-dark">
                            <li class="list-group-item">My Task</li>
                        </a>
                    </ul>
                </div>
            </div>
            @endif
        </div>
        @yield('form-create')
    </div>
</div>
@endsection
