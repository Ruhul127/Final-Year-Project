@extends('layouts.account')

@section('content')




<div class="regi-side">
    <div class="sec-title">
        <h3 class="title">Skills</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="row">

    <div class="col-lg-8">
        <form class="register-form" id="register-form" method="post" action="{{route('trainer.skills.post')}}">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label class="input-label">Title<span class="req"></span></label>
                    <input class="custom-placeholder" type="text" name="title" required="">
                </div>

            </div>


            <div class="submit-btn">
                <button class="readon" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
   
        <div class="rs-pointtable no-overflow gaps bg1">
            <table>
                <tbody>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <!-- <th>Action</th> -->

                    </tr>

                    @foreach ($skills as $index =>  $skill)

                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$skill->title}}</td>
                        <!-- <td>3</td> -->
                    </tr>
                        
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>

    </div>

    </div>

</div>




@endsection