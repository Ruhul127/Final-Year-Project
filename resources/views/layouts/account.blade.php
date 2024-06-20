<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mile end training session') }}</title>


    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('includes.links')
</head>

<body>
    <!-- header -->

    @include('includes.header')

    <!-- Breadcrumbs Section Start -->
    <div class="rs-breadcrumbs">
        <div class="breadcrumbs-wrap">
            <img src="{{asset('assets')}}/images/breadcrumbs/inner4.jpg" alt="Breadcrumbs Image" style="height: 240px;">

        </div>
    </div>
    </div>
    <!-- Breadcrumbs Section End -->

    <!-- Account Login Start -->
    <div id="rs-my-account" class="rs-my-account pt-100 md-pb-80 md-pt-80">
        <div class="col-md-12">
            <div class="row pb-100 md-pb-72">

                <div class="col-lg-2">
                    <div class="title-style mb-10 md-mb-30">
                        <span class="line-bg left-line y-b pt-2">Welcome {{ Auth::user()->name }}</span>
                    </div>
                    <div class="rs-pointtable no-overflow gaps bg3 bdru-4 mb-48 md-mb-72">
                        <table>
                            <tbody>
                                <tr>
                                    <td><a href="{{route('my-account')}}">My Account</a></td>
                                </tr>
                                @if(auth()->user()->role == 3)
                                <tr>
                                    <td><a href="{{route('trainer-skills')}}">Skills</a></td>
                                </tr>
                                <tr>
                                    <td><a href="trainer-session">Sessions</a></td>
                                </tr>

                                @endif

                                @if(auth()->user()->role == 2)
                                <tr>
                                    <td><a href="{{route('user-session')}}">Sessions</a></td>
                                </tr>

                                <tr>
                                    <td><a href="{{route('user-book-session')}}">Book Session</a></td>
                                </tr>

                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <tr>
                                    <td><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-10 mt-40">

                    @yield('content')

                </div>

            </div>

        </div>
    </div>
    <!-- Account Login End -->


    @include('includes.footer')


    <!-- scripts -->

    @include('includes.scripts')

    @yield('script')

</body>

</html>