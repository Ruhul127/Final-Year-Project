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
                    <form class="form-submit" action="{{$route_name}}" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name </label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="name " value="{{$item->name}}">


                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Skil </label>
                                            <input type="text" name="skill" id="skill" class="form-control" placeholder="skill " value="{{$item->skill_name}}">
                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Avg Rating </label>
                                            <input type="number" name="avg_rating" id="avg_rating" class="form-control" placeholder="Avg Rating " value="{{$item->avg_rating}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"> Total rating </label>
                                            <input type="number" name="total_rating" id="total_rating" class="form-control" placeholder="Total Rating " value="{{$item->total_rating}}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Description </label>
                                            <textarea class="form-control" name="description" placeholder="description">{{$item->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Image </label>
                                            <input type="file" class="form-control"  name="image" >
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Status </label>
                                            <select class="form-control" name="status">
                                                <option value="active" {{$item->status == "active" ? "selected" : ""}}>Active</option>
                                                <option value="in-active" {{$item->status == "in-active" ? "selected" : ""}}>In-active</option>

                                            </select>
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