@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="{{url('/')}}">
          <span class="brand-logo">
            <img class="logo-babel" src="{{asset('/images/website/logo-babel-dark.png')}}" alt="Logo Babelprov.go.id">
          </span>
        </a>
      </li>
    </ul>
  </div>
  @else
  <nav class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ ($configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType']  === 'navbar-floating') ? 'container-xxl p-0' : '' }}">
    @endif
    <div class="navbar-container d-flex content p-50 p-xl-1">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item">
              <a class="nav-link menu-toggle" href="javascript:void(0);">
                  <i class="ficon" data-feather="menu"></i>
              </a>
          </li>
        </ul>
          <a href="{{url('/')}}" class="d-block d-xl-none">
              <img width="250px" height="auto" alt="Home Babelprov" src="{{ asset('images/website/logo-babel-v-dark.png') }}">
          </a>
        <ul class="nav navbar-nav">
          <li class="nav-item d-none d-xl-block">
            <a class="nav-link nav-link-style">
              <i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i>
            </a>
          </li>
        </ul>
      </div>

      {{-- Get in Touch--}}
      <ul class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name font-weight-bolder">Get in Touch</span>
              <span class="user-status">babelprov.go.id</span>
            </div>
            <span class="avatar">
              <img src="{{asset('/images/website/getintouch_babel.png')}}" alt="avatar" height="40" width="40">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
              <a class="dropdown-item" href="https://twitter.com/pemprovkepbabel?s=11&t=oKDli0JfeBV6D6_Ez3Q4zw">
              <i class="mr-50" data-feather="twitter"></i> Twitter
            </a>
            <a class="dropdown-item" href="https://www.youtube.com/channel/UCteyVwrbKP43vodza9wHbRA">
              <i class="mr-50" data-feather="youtube"></i> Youtube
            </a>
            <a class="dropdown-item" href="https://www.facebook.com/pemprovbabel">
              <i class="mr-50" data-feather="facebook"></i> Facebook
            </a>
            <a class="dropdown-item" href="https://www.instagram.com/diskominfobabel">
              <i class="mr-50" data-feather="instagram"></i> Instagram
            </a>
            <a class="dropdown-item" href="https://www.tiktok.com/@diskominfobabel?_t=8gECgM5bvwl&_r=1">
              <i class="fab fa-tiktok mr-50" ></i> Tiktok
            </a>
            
          </div>
        </li>
      </ul>

    </div>
  </nav>

  <!-- END: Header-->
