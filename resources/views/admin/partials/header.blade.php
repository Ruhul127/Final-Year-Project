 <!-- ============================================================== -->
 <!-- Topbar header - style you can find in pages.scss -->
 <!-- ============================================================== -->
 <header class="topbar">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
         <!-- ============================================================== -->
         <!-- Logo -->
         <!-- ============================================================== -->
         <div class="navbar-header">
             <a class="navbar-brand" href="">
                 <b>

                     <a>Mile end training session</a>

                 </b>
             </a>
             <!--End Logo icon -->
             <!-- Logo text -->
             <!-- dark Logo text -->
             <!-- <img src="{{asset('assets')}}/images/logonews.png" alt="homepage" /> -->
             <!-- Light Logo text -->
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <div class="navbar-collapse">
             <!-- ============================================================== -->
             <!-- toggle and nav items -->
             <!-- ============================================================== -->
             <ul class="navbar-nav me-auto">
                 <!-- This is  -->
                 <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                 <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                 <!-- ============================================================== -->

             </ul>
             <!-- ============================================================== -->
             <!-- User profile and search -->
             <!-- ============================================================== -->
             <ul class="navbar-nav my-lg-0">

                 <!-- ============================================================== -->
                 <!-- ============================================================== -->
                 <!-- mega menu -->

                 <!-- End mega menu -->
                 <!-- ============================================================== -->
                 <!-- ============================================================== -->
                 <!-- User Profile -->
                 <!-- ============================================================== -->
                 <li class="nav-item dropdown u-pro">
                     <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i> <span class="hidden-md-down">Admin</span> </a>
                     <div class="dropdown-menu dropdown-menu-end animated flipInY">
                         <!-- text-->
                         <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a> -->
                         <!-- text-->
                         <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a> -->
                         <!-- text-->
                         <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a> -->
                         <!-- text-->

                         <div class="dropdown-divider"></div>
                         <!-- text-->
                         <a href="" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                         <!-- text-->
                         @if (Auth::check())
                         <div class="dropdown-divider"></div>

                         <form action="{{ route('logout') }}" method="POST">
                             @csrf
                             <button type="submit" class="dropdown-item">Logout</button>
                         </form>
                         <!-- text-->

                         @endif
                         <!-- text-->
                     </div>
                 </li>
                 <!-- ============================================================== -->
                 <!-- End User Profile -->
                 <!-- ============================================================== -->

             </ul>
         </div>
     </nav>
 </header>
 <!-- ============================================================== -->
 <!-- End Topbar header -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">

                 <li> <a class="waves-effect waves-dark" href="{{route('users.index')}}">Users</a></li>
                 <li> <a class="waves-effect waves-dark" href="{{route('trainers.index')}}">Trainers</a></li>
                 <li> <a class="waves-effect waves-dark" href="{{route('booking.index')}}">Booking</a></li>


             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->