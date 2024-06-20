@extends('layouts.account')

@section('content')




<div class="regi-side">
    <div class="sec-title">
        <h3 class="title">Book Session</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

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
                                            <label class="form-label">Trainer </label>
                                            <select class="form-control change-trainer" name="trainer_id">
                                                <option value="">Select</option>
                                                @foreach ($trainers as $trainer)
                                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

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