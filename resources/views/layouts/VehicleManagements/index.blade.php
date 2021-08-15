@extends('layouts.home')
@section('form-create')
<div class="col-md-9 d-flex justify-content-center" data-aos="fade-down">
    <div class="card ml-4 p-3">
        <div class="table-responsive">
            <table class="table table-striped w-100 py-3" id="crudTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th style="min-width: 100px">Driver Name</th>
                        <th>Vehicle Number</th>
                        <th>Color</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
    @push('addon-script')
    <script>
            var datatable = $('#crudTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                scrollX: true,
                // autoWidth:true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'vehicle_number',
                        name: 'vehicle_number'
                    },
                    {
                        data: 'color',
                        name: 'color',
                    },
                    {
                        data: 'picture',
                        name: 'picture',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });
    </script>
    @endpush
@endsection
