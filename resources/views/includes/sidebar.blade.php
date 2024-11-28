 <div class="left side-menu"><button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left"><i
             class="ion-close"></i></button><!-- LOGO -->
     <div class="topbar-left">
         <div class="text-center"><!--<a href="index.html" class="logo"><i class="fa fa-paw"></i> Aplomb</a>-->
             <a href="{{ route('admin.dashboard') }}" class="logo"><img src="{{ asset('assets/images/logo.png') }}"
                     height="14" alt="logo"></a>
         </div>
     </div>
     <div class="sidebar-inner slimscrollleft" id="sidebar-main">
         <div id="sidebar-menu">
             <ul>
                 <li class="menu-title">Overview</li>
                 <li class="has_sub"><a href="{{ route('admin.dashboard') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-view-dashboard"></i><span> Dashboard </span></a></li>
                 <li><a href="{{ route('profiles.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-account"></i><span>
                             Users</span></a></li>
                 <li><a href="{{ route('car_washers.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-worker"></i><span>
                             Car Washers</span></a></li>
                 <li><a href="{{ route('washing_centers.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-factory"></i><span>
                             Washing Centres</span></a></li>
                 <li><a href="{{ route('services.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-wrench"></i><span>
                             Category</span></a></li>
                 <li><a href="{{ route('names.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-arrow-right-bold"></i><span>
                             Sub-Features</span></a></li>
                 <li><a href="{{ route('service_details.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-truck"></i><span>
                             Service details</span></a></li>
                 <li><a href="{{ route('addons.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-view-module"></i><span>
                             Add Ons</span></a></li>
                 <li><a href="{{ route('faqs.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-help-circle"></i><span>
                             Faqs</span></a></li>
                 <li><a href="{{ route('reviews.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-star"></i><span>
                             User Reviews</span></a></li>
                 <li><a href="{{ route('banners.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-image"></i><span>
                             Images</span></a></li>
                 <li><a href="{{ route('service_listings.index') }}" class="waves-effect waves-light"><i
                             class="mdi mdi-file-outline"></i><span>
                             Service Listings</span></a></li>
                 <li class="has_sub"><a href="javascript:void(0);" class="waves-effect waves-light"><i
                             class="mdi mdi-email"></i><span> Email </span><span class="float-right"><i
                                 class="mdi mdi-chevron-right"></i></span></a>
                     <ul class="list-unstyled">
                         <li><a href="email-inbox.html">Inbox</a></li>
                         <li><a href="email-compose.html">Compose Mail</a></li>
                         <li><a href="email-read.html">View Mail</a></li>
                     </ul>
                 </li>
                 <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"><i
                             class="mdi mdi-google-pages"></i><span> Pages </span><span class="float-right"><i
                                 class="mdi mdi-chevron-right"></i></span></a>
                     <ul class="list-unstyled">
                         <li><a href="pages-profile.html">Profile</a></li>
                     </ul>
                 </li>

             </ul>
         </div>
         <div class="clearfix"></div>
     </div><!-- end sidebarinner -->
 </div><!-- Left Sidebar End -->
