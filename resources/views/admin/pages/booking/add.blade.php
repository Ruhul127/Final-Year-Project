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
                    <form class="form-submit" method="post" action="{{$route_name}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- <h4 class="card-title">Person Info</h4> -->
                        </div>
                        <hr>
                        <div class="form-body">
                            <div class="card-body">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif


                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">User </label>
                                            <select class="form-control" name="user_id">
                                                <option value="">Select</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Trainer </label>
                                            <select class="form-control change-trainer" name="trainer_id">
                                                <option value="">Select</option>
                                                @foreach ($trainers as $trainer)
                                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Trainings Skills </label>
                                            <select class="form-control skills-data" name="skill">

                                            </select>
                                        </div>
                                    </div>


                                </div>


                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Start date</label>
                                            <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control" placeholder="start_datetime">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Start End date</label>
                                            <input type="datetime-local" name="end_datetime" id="end_datetime" class="form-control" placeholder="end_datetime">
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
    $(".change-trainer").change(function(e) {

        var trainer = $(this).val();
        $.ajax({
            type: "GET",
            url: '{{route("trainerSkills")}}',
            data: {
                trainer: trainer
            },
            // contentType: false,
            success: function(data) {

                let skills = data.data;

                console.log(skills, 'data')

                var html = ``;

                for (let index = 0; index < skills.length; index++) {
                    var skill = skills[index];

                    html += `<option value='${skill.id}'>${skill.title}</option>`;

                }

                $('.skills-data').html(html);

            },
            error: function(e) {


            }
        });

    });
</script>

@endsection