@extends('admin.layout.master')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        @include('admin.partials.profilenav')
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">


                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5 kt_table_users" id="filterTable">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Ratings</th>
                            <th class="min-w-125px">Description</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>


                    <tbody class="text-gray-600 fw-bold">
                        <!--begin::Table row-->
                        @foreach($ratings as $rating)
                        <tr>
                            <td>{{isset($rating->user->name) ? $rating->user->name : ''}}</td>
                            <td>{{$rating->rate_num}}</td>
                            <td>{{$rating->rating_text}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table head-->
                    <!--begin::Table body-->

                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection
@section('script')
<script>
    $('#filterTable').DataTable({
        "scrollY": 200,
        "scrollX": true
    });

    // $("#categoryFilter").change(function(e) {
    //     // console.log($(this).val(), "ASd");
    //     var status = $(this).val();
    //     window.location.href = "{{route('managers.contracts', lastSegment())}}?contract_status=" + status;


    // });
</script>


<script>
    // $(document).ready(function() {

    //     fill_datatable();

    //     function fill_datatable(fromArray) {
    //         var formData = fromArray;
    //         var dataTable = $('#filterTable').DataTable({
    //             processing: true,
    //             serverSide: true,
    //             ajax: {
    //                 url: "{{ route('event.managers') }}",
    //                 data: formData
    //             },
    //             columns: [{
    //                     data: 'CustomerName',
    //                     name: 'CustomerName'
    //                 },
    //                 {
    //                     data: 'Gender',
    //                     name: 'Gender'
    //                 },
    //                 {
    //                     data: 'Address',
    //                     name: 'Address'
    //                 },
    //                 {
    //                     data: 'City',
    //                     name: 'City'
    //                 },
    //                 {
    //                     data: 'PostalCode',
    //                     name: 'PostalCode'
    //                 },
    //                 {
    //                     data: 'Country',
    //                     name: 'Country'
    //                 }
    //             ]
    //         });
    //     }

    //     $('#categoryFilter').click(function() {
    //         var contract_status = $('#categoryFilter').val();

    //         fill_datatable({contract_status:contract_status});


    //         // if (filter_gender != '' && filter_gender != '') {
    //         //     $('#filterTable').DataTable().destroy();

    //         // } else {
    //         //     alert('Select Both filter option');
    //         // }
    //     });


    // });
</script>



@endsection