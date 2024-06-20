@extends('admin.layout.master')
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        @include('admin.user.partials.profilenav')


        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder mb-0">Details</h2>
                </div>
                <!--end::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">

                    <!--begin::Col-->
                    <div class="flex-equal me-5">
                        <table class="table table-flush fw-bold gy-1">
                            <tbody>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Booking purpose</td>
                                    <td class="text-gray-800">{{$booking->booking_purpose}} </td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">People limit</td>
                                    <td class="text-gray-800">{{$booking->people_limit}}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Is alcohol</td>
                                    <td class="text-gray-800">{{$booking->is_alcohol}}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Message</td>
                                    <td class="text-gray-800">{{$booking->message}}</td>
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="flex-equal">
                        <table class="table table-flush fw-bold gy-1">
                            <tbody>
                            <tr>
                                    <td class="text-muted min-w-125px w-125px">Booking date</td>
                                    <td class="text-gray-800">{{$booking->booking_date}}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Booking hours</td>
                                    <td class="text-gray-800">{{$booking->booking_hours}}</td>
                                </tr>

                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Processing fee</td>
                                    <td class="text-gray-800">{{$booking->processing_fee}}</td>
                                </tr>

                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Total</td>
                                    <td class="text-gray-800">{{$booking->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Details-->

                <div class="separator separator-dashed"></div>
                <div class="py-0" data-kt-customer-payment-method="row">
                    <!--begin::Header-->
                    <div class="py-3 d-flex flex-stack flex-wrap">
                        <!--begin::Toggle-->
                        <div class="d-flex align-items-center collapsible rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_1">

                            <!--begin::Summary-->
                            <div class="me-3">
                                <div class="d-flex align-items-center">
                                    <div class="text-gray-800 fw-bolder">Property Details</div>

                                </div>

                            </div>
                            <!--end::Summary-->
                        </div>
                        <!--end::Toggle-->

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div id="kt_customer_view_payment_method_1" class="collapse show " data-bs-parent="#kt_customer_view_payment_method">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-5">

                            <!--begin::Col-->
                            <div class="flex-equal me-5">
                                <table class="table table-flush fw-bold gy-1">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Name</td>
                                            <td class="text-gray-800">{{$property->title}}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">pricing</td>
                                            <td class="text-gray-800">{{isset($property->pricing->hourly_rate) ? $property->pricing->hourly_rate : 0}}</td>
                                        </tr>



                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Status</td>
                                            <td class="text-gray-800">{{$property->status}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Country</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_country}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Space ddress</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">City</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_city}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">State</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_state}}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Zip code</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_zip_code}}</td>
                                        </tr>


                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Parking options</td>
                                            <td class="text-gray-800">

                                                @foreach($property->parkingOptions as $parkingOption)
                                                <span>{{$parkingOption->name}}</span>
                                                @endforeach

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Parking description</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->parking_description}}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Security camera recording device</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->security_camera_recording_device}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="flex-equal">
                                <table class="table table-flush fw-bold gy-1">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Description</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_description}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">sqft</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_book_sqft}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Allowed age</td>
                                            <td class="text-gray-800">
                                                {{$property->propertyDetail->space_allowed_age}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Wifi name password</td>
                                            <td class="text-gray-800">
                                                <a href="#" class="text-gray-900 text-hover-primary">{{$property->propertyDetail->space_wifi_name_password}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Arrival instruction</td>
                                            <td class="text-gray-800">{{$property->propertyDetail->space_arrival_instruction}}

                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Operating hours</td>
                                            <td class="text-gray-800">

                                                @foreach($property->operatingHours as $operatingHour)
                                                <?php
                                                $times = $operatingHour->propertySlots()->pluck('time_slot')->toArray();
                                                // dd($times);
                                                // implode(",".$times)
                                                ?>
                                                <span class="border border-gray-300 border-dashed rounded  m-3">{{$operatingHour->day_name}} | {{implode(",",$times)}}</span>
                                                @endforeach

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Host activities</td>
                                            <td class="text-gray-800">

                                                @foreach($property->hostActivities as $hostActivity)

                                                <span class="border border-gray-300 border-dashed rounded  m-3">{{$hostActivity->title}} </span>
                                                @endforeach

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Amenities</td>
                                            <td class="text-gray-800">

                                                @foreach($property->propertyAmenities as $propertyAmenity)

                                                <span class="border border-gray-300 border-dashed rounded  m-3">{{$propertyAmenity->name}} </span>
                                                @endforeach



                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <!--end::Col-->


                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Body-->
                </div>
                <div class="separator separator-dashed"></div>
                <!--begin::Option-->

                <!--end::Option-->
            </div>
            <!--end::Card body-->
        </div>


    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection
@section('script')


@endsection