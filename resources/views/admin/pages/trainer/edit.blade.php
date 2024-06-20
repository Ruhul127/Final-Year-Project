@extends('admin.layout.master')
@section('content')

            <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">{{$title}}</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <!-- <div class="d-flex justify-content-end align-items-center">
                           
                            <a href="" class="btn btn-info d-none d-lg-block m-l-15 text-white"> Create New</a>
                        </div> -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
              
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="mb-0 text-white">{{$title}}</h4>
                            </div>
                            <form class="form-submit" action="{{route('saveUpdateCategoryMeta')}}" enctype="multipart/form-data">
                            @csrf    
                            <div class="card-body">
                                    <!-- <h4 class="card-title">Person Info</h4> -->
                                </div>
                                <hr>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row pt-3">
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" id="name" class="form-control" placeholder="Name" value="{{$item->title}}">
                                                </div>
                                            </div> -->

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">meta_title </label>
                                                    <input type="text" name="site_meta_title" id="site_meta_title" class="form-control" placeholder="meta_title " value="{{isset($item->themeMeta->site_meta_title) ? $item->themeMeta->site_meta_title : ''}}">
                                                    <input type="hidden" name="id" id="id"  value="{{$item->id}}">

                                                    
                                                    <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                                </div>
                                            </div>

                                          


                                            
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">meta_descroption </label>
                                                <input type="text" name="site_meta_descroption" id="site_meta_descroption" class="form-control" placeholder="meta_descroption" value="{{isset($item->themeMeta->site_meta_descroption) ? $item->themeMeta->site_meta_descroption : ''}}">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">meta_keywords </label>
                                                    <input type="text" name="site_meta_keywords" id="site_meta_keywords" class="form-control" placeholder="meta_keywords estate,buy,sell eg " value="{{isset($item->themeMeta->site_meta_keywords) ? $item->themeMeta->site_meta_keywords : ''}}">
                                                    <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                        <!--/row-->
                                       
                                    
                                    </div>
                                    
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i> Save</button>
                                            <!-- <button type="button" class="btn btn-dark">Cancel</button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                
              
           
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
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
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

@endsection


@section('script')
<script>
    $(".form-submit").on("submit", function(e) {


        // Get form
        var form = $(this)[0];
        // FormData object 
        var data = new FormData(form);
        console.log(data);

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {

            

                let message = data.message;
                $.notify('Success: ' + message, 'success');
                // console.log(message , "message");
                // Object.keys(message).forEach(key => {
                  

                // });

                // $('.form-submit')[0].reset()


                setTimeout(function() {
                    // location.reload();
                    // window.location.href = "}";
                }, 2000);
            },
            error: function(e) {

                var parseData = JSON.parse(e.responseText);
                let message = parseData.data;

                Object.keys(message).forEach(key => {
                    $.notify('Warning: ' + message[key]);
                    // $('#formData').find('input[name="' + key + '"]').css('border', '1px solid red');

                });

            }
        });

        e.preventDefault();
    });
</script>
@endsection