@extends('layouts.home')
@section('form-create')
<div class="col-md-9 d-flex justify-content-center" data-aos="fade-down" data-aos-duration="700">
    <div class="card ml-4 p-3">
        <div class="table-responsive">
            <table class="table table-striped w-100 py-3" id="crudTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th style="min-width: 100px">Your Name</th>
                        <th>Your Email</th>
                        <th style="min-width: 100px">Item Code</th>
                        <th>Weight</th>
                        <th style="min-width: 350px">Delivery Address</th>
                        <th style="min-width: 150px">Customer Name</th>
                        <th style="min-width: 250px">Customer Mobile Number</th>
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
                        data: 'user.email',
                        name: 'user.email'
                    },
                    {
                        data: 'item_code',
                        name: 'item_code'
                    },
                    {
                        data: 'weight',
                        name: 'weight'
                    },
                    {
                        data: 'delivery_address',
                        name: 'delivery_address'
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'customer_mobile_number',
                        name: 'customer_mobile_number'
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
