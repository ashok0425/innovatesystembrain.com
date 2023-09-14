<header id="header" class="header">
    <div class="top-left">
       <div class="navbar-header">
        @php
            $logo=DB::table('frontendsettings')->first()
        @endphp
          <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{asset($logo->logo)}}" alt="Logo" width="40"></a>
          <a id="menuToggle" class="menutoggle"><i class="fas fa-bars"></i></a>
       </div>
    </div>
    <div class="top-right">
       <div class="header-menu">
          <div class="user-area dropdown float-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset(Auth::user()->profile_photo_path)}}" alt="adminlogo" width="50" height="50" style="border-radius: 50%; margin-right:10px;"> {{Auth::user()->name}}</a>
             <div class="user-menu dropdown-menu">
             <a class="nav-link" href="{{route('profile.update')}}"><i class="fas fa-user"></i>My profile</a>
             <hr style="margin:0;">
             <a class="nav-link" href="{{route('change.password')}}"><i class="fas fa-lock"></i>Change Password</a>
             <hr style="margin:0;">
             <a class="nav-link" href="{{route('userlogout')}}"><i class="fas fa-power-off"></i>Logout</a>
             </div>
          </div>
       </div>
    </div>
 </header>
