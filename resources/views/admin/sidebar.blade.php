<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
       <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
             <li class="menu-title">Menu</li>
             <li class="menu-item-has-children dropdown">
             <a href="{{route('admin.banners.index')}}" class="{{ request()->segment(1)=='banner' ? 'active':'' }}">Banner</a>
             </li>
             <li class="menu-item-has-children dropdown">
               <a href="{{route('admin.teams.index')}}" class="{{ request()->segment(1)=='teams' ? 'active':'' }}" >Team</a>

             </li>
             <li class="menu-item-has-children dropdown">
             <a href="{{route('admin.portfolios.index')}}" class="{{ request()->segment(1)=='protfolio' ? 'active':'' }}" >Portfolio</a>
             </li>


             <li class="menu-item-has-children dropdown">
                <a href="{{route('admin.testimonials.index')}}" class="{{ request()->segment(1)=='testimonial' ? 'active':'' }}">Testimonial</a>
                </li>


             <li class="menu-item-has-children dropdown">
               <a href="{{route('admin.services.index')}}" class="{{ request()->is('admin/services.*') ? 'active':'' }}">Services</a>
               </li>
               <li class="menu-item-has-children dropdown">
                  <a href="{{route('admin.blogs.index')}}" class="{{ request()->segment(1)=='blog' ? 'active':'' }}">Blog</a>
                  </li>


                  <li class="menu-item-has-children dropdown">
                    <a href="{{route('admin.faqs.index')}}" class="{{ request()->segment(1)=='faq' ? 'active':'' }}" >Faq</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('admin.branches.index')}}" class="{{ request()->segment(1)=='faq' ? 'active':'' }}" >Branch</a>
                        </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="{{route('admin.frontend-setting')}}" class="{{ request()->segment(1)=='frontend-setting' ? 'active':'' }}">Frontend setting</a>


                         {{-- <li class="menu-item-has-children dropdown">
                        <a href="{{route('admincontact')}}" class="{{ request()->segment(1)=='contactlist' ? 'active':'' }}">Contact List</a>
                        </li> --}}
{{--

                              <li class="menu-item-has-children dropdown">
                                 <a href="{{route('subscriberlist')}}" class="{{ request()->segment(1)=='subscriberlist' ? 'active':'' }}">Subscriber</a>
                                 </li> --}}
                              {{-- <li class="menu-item-has-children dropdown">
                                 <a href="{{route('extrasetting')}}" class="{{ request()->segment(1)=='extrasetting' ? 'active':'' }}">Extra setting</a>
                                 </li> --}}
          </ul>
       </div>
    </nav>
 </aside>
