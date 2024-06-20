@extends('admin.layout.master')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
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
                <table class="table align-middle table-row-dashed fs-6 gy-5 kt_table_users" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th>id</th>
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Phone</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Created at</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        <!--begin::Table row-->
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="{{route('property.users.profile',$user->id)}}">
                                        <div class="symbol-label">
                                            <img src="{{!empty($user->profile_pic)  ? $user->profile_pic :  asset('assets').'/placeholder.jpg' }}" alt="Emma Smith" class="w-100" />
                                        </div>
                                    </a>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <a href="{{route('property.users.profile',$user->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                                    <span>{{$user->email}}</span>
                                </div>
                                <!--begin::User details-->
                            </td>
                            <!--end::User=-->
                            <td>{{$user->phone}}</td>
                            <!--begin::Role=-->
                            <td>{{$user->email}}</td>
                            <!--end::Role=-->
                            <!--begin::Last login=-->
                            <td>
                                <div class="badge badge-light fw-bolder">{{$user->created_at}}</div>
                            </td>
                            <!--end::Last login=-->
                    
                         
                        </tr>
                        @endforeach
                    </tbody>
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
    $('.kt_table_users').DataTable({
        "scrollY": 200,
        "scrollX": true
    });
</script>
@endsection