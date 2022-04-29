<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('Backend/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{asset('Backend/assets/images/faces/face15.jpg')}}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


          @if(Auth::user()->category==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('category')}}">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('Allsubcategory')}}">subCatygory</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->district==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">District Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('Alldistrict')}}">District</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('Allsubdistrict')}}">SubDistrict </a></li>
              </ul>
            </div>
          </li>
          @else
          @endif

          @if(Auth::user()->post==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
              <span class="menu-icon">
                <i class="mdi mdi-share"></i>
              </span>
              <span class="menu-title">Post Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('post.create')}}">Add Post</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('post.index')}}">All Post </a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#SocialSetting" aria-expanded="false" aria-controls="SocialSetting">
              <span class="menu-icon">
                <i class="mdi mdi-network"></i>
              </span>
              <span class="menu-title">SettingSocial</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="SocialSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Social.index')}}">Socials</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Social.create')}}">Socials Add</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#SeoSetting" aria-expanded="false" aria-controls="SeoSetting">
              <span class="menu-icon">
                <i class="mdi mdi-check"></i>
              </span>
              <span class="menu-title">SettingSEO</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="SeoSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Seo.index')}}">Seo</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Seo.create')}}">Seo Add</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif

          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#PrayerSetting" aria-expanded="false" aria-controls="PrayerSetting">
              <span class="menu-icon">
                <i class="mdi mdi-watch"></i>
              </span>
              <span class="menu-title">SettingPrayer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="PrayerSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Prayer.index')}}">prayer</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Prayer.create')}}">prayer Add</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#LiveTvSetting" aria-expanded="false" aria-controls="LiveTvSetting">
              <span class="menu-icon">
                <i class="mdi mdi-television"></i>
              </span>
              <span class="menu-title">SettingLivetv</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="LiveTvSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.LiveTv.index')}}">Livetv</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif



          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#NoticesSetting" aria-expanded="false" aria-controls="NoticesSetting">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
              <span class="menu-title">SettingNotices</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="NoticesSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Notices.index')}}">Notices</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif



          @if(Auth::user()->setting==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#WebsiteSetting" aria-expanded="false" aria-controls="WebsiteSetting">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
              <span class="menu-title">SettingWebsite</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="WebsiteSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Setting.Website.index')}}">Website</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->gallery==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#PhotoSetting" aria-expanded="false" aria-controls="PhotoSetting">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
              <span class="menu-title">Gallery</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="PhotoSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('gallery.index')}}">Gallery</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('galleryVideo.index')}}">Video</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->ads==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#AdsSetting" aria-expanded="false" aria-controls="AdsSetting">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
              <span class="menu-title">Ads</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="AdsSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Ads.index')}}">All Ads</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Ads.create')}}">Add Ads</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif



          @if(Auth::user()->role==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#RoleSetting" aria-expanded="false" aria-controls="RoleSetting">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
              <span class="menu-title">Role</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="RoleSetting">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('Role.index')}}">All Admin</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('Role.create')}}">Add Admin</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


        
          
        </ul>
      </nav>