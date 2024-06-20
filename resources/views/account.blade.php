@extends('layouts.account')

@section('content')




<div class="regi-side">
    <div class="sec-title">
        <h3 class="title">Profile Update</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <form class="register-form" id="register-form" method="post" action="{{route('updateProfile',Auth::user()->id)}}">
        @csrf

        <div class="row">

            <div class="col-md-6">
                <label class="input-label">Name<span class="req"></span></label>
                <input class="custom-placeholder" value="{{ Auth::user()->name }}" type="text" name="name" required="">
            </div>

            <div class="col-md-6">
                <label class="input-label">Email <span class="req"></span></label>
                <input class="custom-placeholder" type="text" value="{{ Auth::user()->email }}" name="email" required="" readonly>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <label class="input-label">Surname<span class="req"></span></label>
                <input class="custom-placeholder" type="text" name="surname" value="{{ Auth::user()->surname }}" required="">
            </div>

            <div class="col-md-6">
                <label class="input-label">D.O.B <span class="req"></span></label>
                <input class="custom-placeholder" type="date" name="dob" value="{{ Auth::user()->dob }}" required="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="margin-space gender-detect">
                    <label class="input-label">Gender <span class="req">*</span></label>
                    <br>
                    <label>
                        <input class="radio-btn" type="radio" name="gender" value="male" {{ Auth::user()->gender == "male" ? "checked" : "" }} required=""><span>Male</span>
                    </label>
                    <label>
                        <input class="radio-btn" type="radio" name="gender" value="female" {{ Auth::user()->gender == "female" ? "checked" : "" }} required=""><span>Female</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="submit-btn">
            <button class="readon" type="submit">Update</button>
        </div>
    </form>
</div>




@endsection