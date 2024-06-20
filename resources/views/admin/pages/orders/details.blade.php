@extends('admin.layout.master')
@section('content')
<style>
    .bg-light,
    .bg-light>a {
        color: #1f2d3d !important;
    }

    .info-box {
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        border-radius: 0.25rem;
        background-color: #fff;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 1rem;
        min-height: 80px;
        padding: 0.5rem;
        position: relative;
        width: 100%;
    }

    .info-box .info-box-content {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-pack: center;
        justify-content: center;
        line-height: 1.8;
        -ms-flex: 1;
        flex: 1;
        padding: 0 10px;
        overflow: hidden;
    }

    .info-box .info-box-text,
    .info-box .progress-description {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .info-box .info-box-number {
        display: block;
        margin-top: 0.25rem;
        font-weight: 700;
    }
</style>
<div class="page-wrapper" style="min-height: 179px;">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Order</h4>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>Order</b>
                        <!-- <span class="pull-right">#5669626</span> -->
                    </h3>
                    <hr>

                    <div class="row">

                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Package</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{isset($item->package->name) ? $item->package->name : ''}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Designer</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{isset($item->designer->name) ? $item->designer->name : ''}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Amount</span>
                                    <span class="info-box-number text-center text-muted mb-0">${{$item->total}}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">


                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">{{isset($item->user->first_name) ? $item->user->first_name.' '.$item->user->last_name : ''}}</b></h3>
                                    <p class="text-muted m-l-5">
                                        <br> {{$item->billing_email}}
                                        <br> {{$item->billing_address}}
                                        <!-- <br> Talaja Road,
                                        <br> Bhavnagar - 364002 -->
                                    </p>
                                </address>
                            </div>
                            <!-- <div class="pull-right text-end">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">Gaala &amp; Sons,</h4>
                                    <p class="text-muted m-l-30">E 104, Dharti-2,
                                        <br> Nr' Viswakarma Temple,
                                        <br> Talaja Road,
                                        <br> Bhavnagar - 364002
                                    </p>
                                    <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2017</p>
                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2017</p>
                                </address>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-light">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="2">Project Detals</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Project country:</td>
                                                    <td>{{isset($item->project_country) ? $item->project_country : ''}}</td>

                                                </tr>

                                                <tr>
                                                    <td>Project province:</td>
                                                    <td>{{isset($item->project_province) ? $item->project_province : ''}}</td>

                                                </tr>


                                                <tr>
                                                    <td>Project address:</td>
                                                    <td>{{isset($item->project_address) ? $item->project_address : ''}}</td>

                                                </tr>

                                                <tr>
                                                    <td>Project requirement:</td>
                                                    <td>{{isset($item->project_requirement) ? $item->project_requirement : ''}}</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box bg-light">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="2">Addons</th>

                                                </tr>
                                                <tr>
                                                    <th class="">Title</th>
                                                    <th class="">Price</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($item->addons as $addon)
                                                <tr>
                                                    <td>{{$addon['title']}}</td>
                                                    <td>${{$addon['price']}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-box bg-light">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="2">Addons</th>

                                                </tr>
                                                <tr>
                                                    <th class="">Images</th>
                                                    <th class="">View</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($item->gallery as $image)
                                                <tr>
                                                    <td><img src="{{asset($image['path'])}}" width="100px"></td>
                                                     <td><a href="{{asset($image['path'])}}">View</a></td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            
                        </div>

                        <!-- <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-end">Quantity</th>
                                            <th class="text-end">Unit Cost</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Milk Powder</td>
                                            <td class="text-end">2 </td>
                                            <td class="text-end"> $24 </td>
                                            <td class="text-end"> $48 </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Air Conditioner</td>
                                            <td class="text-end"> 3 </td>
                                            <td class="text-end"> $500 </td>
                                            <td class="text-end"> $1500 </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>RC Cars</td>
                                            <td class="text-end"> 20 </td>
                                            <td class="text-end"> %600 </td>
                                            <td class="text-end"> $12000 </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>Down Coat</td>
                                            <td class="text-end"> 60 </td>
                                            <td class="text-end">$5 </td>
                                            <td class="text-end"> $300 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-end">
                                <!-- <p>Sub - Total amount: $13,848</p>
                                <p>vat (10%) : $138 </p>
                                <hr> -->
                                <h3><b>Total :</b> ${{$item->total}}</h3>
                            </div>
                            <!-- <div class="clearfix"></div> -->
                            <!-- <hr>
                            <div class="text-end">
                                <button class="btn btn-danger text-white" type="submit"> Proceed to payment </button>
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar ps ps--theme_default" data-ps-id="b2a3eb8b-d5e8-ae57-a857-a0322ef08c73">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
                <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
@endsection

@section('script')

<script>

</script>

@endsection