@extends('admin.layout.master')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
    @include('admin.user.partials.profilenav')
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

                <div class="category-filter col-md-4">
                    
                    <label>Select Status</label>
                    <select id="categoryFilter" class="form-control">
                        <option value="">Show All</option>
                        <option value="completed" {{$contract_status == 'completed' ? 'selected' : ''}}>Completed</option>
                        <option value="accepted" {{$contract_status == 'accepted' ? 'selected' : ''}}>Accepted</option>
                        <!-- <option value="Jazz">Jazz</option> -->
                    </select>
                </div>

                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5 kt_table_users" id="filterTable">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th>id</th>
                            <th class="min-w-125px">Title</th>
                            <th class="min-w-125px">Property title</th>
                            <th class="min-w-125px">Amount</th>
                            <th class="min-w-125px">Description</th>
                            <th class="min-w-125px">Client Name</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Action</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>


                    <tbody class="text-gray-600 fw-bold">
                        <!--begin::Table row-->
                        @foreach($managerContracts as $contract)
                        <tr>
                            <td>{{$contract->id}}</td>
                            <td>{{$contract->title}}</td>
                            <td>{{$contract->property->title}}</td>
                            <td>${{$contract->amount}}</td>
                            <td>{{$contract->description}}</td>
                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="#">
                                        <div class="symbol-label">
                                            <img src="{{!empty($contract->owner->profile_pic)  ? $contract->owner->profile_pic :  asset('assets').'/placeholder.jpg' }}" alt="Emma Smith" class="w-100" />
                                        </div>
                                    </a>

                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <a href="" class="text-gray-800 text-hover-primary mb-1">{{$contract->owner->name}}</a>
                                    <span>{{$contract->owner->name}}</span>
                                </div>
                                <!--begin::User details-->
                            </td>
                            <!--end::User=-->
                            <td>{{$contract->contract_status}}</td>

                              <!--begin::Action=-->
                              <td class="">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('view.user.contract',[$contract->id,userDetails()->id])}}" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->

                            




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

    $("#categoryFilter").change(function(e) {
        // console.log($(this).val(), "ASd");
        var status = $(this).val();
        window.location.href = "{{route('managers.contracts', lastSegment())}}?contract_status=" + status;


    });
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