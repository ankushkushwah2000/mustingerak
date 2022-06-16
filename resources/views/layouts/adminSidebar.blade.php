<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="">
          <span class="brand-logo">
            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
              <defs>
                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                  <stop stop-color="#000000" offset="0%"></stop>
                  <stop stop-color="#FFFFFF" offset="100%"></stop>
                </lineargradient>
                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                  <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                  <stop stop-color="#FFFFFF" offset="100%"></stop>
                </lineargradient>
              </defs>
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                  <g id="Group" transform="translate(400.000000, 178.000000)">
                    <path class="text-primary" id="Path"
                      d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                      style="fill:currentColor"></path>
                    <path id="Path1"
                      d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                      fill="url(#linearGradient-1)" opacity="0.2"></path>
                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                      points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                      points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                      points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                  </g>
                </g>
              </g>
            </svg>
          </span>
          <h2 class="brand-text">E-Comm+MLM</h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
            data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="nav-item  ">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="home"></i>
          <span class="menu-title text-truncate capitalize">Dashboards</span>
        </a>
      </li>
      <li class="navigation-header">
        <span>Collection &amp; Pages</span>
        <i data-feather="more-horizontal"></i>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="users"></i>
          <span class="menu-title text-truncate capitalize">Users</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.users.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">All</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.seller_requests.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Seller Request</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="box"></i>
          <span class="menu-title text-truncate capitalize">Inventory</span>
        </a>
        <ul class="menu-content">
          <li class="nav-item  ">
            <a href="{{ route('admin.products.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate capitalize">Products</span>
            </a>
          </li>
          {{-- <li class="nav-item  ">
            <a href="{{ route('admin.products.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate capitalize">Variants</span>
            </a>
          </li> --}}
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="grid"></i>
          <span class="menu-title text-truncate capitalize">Categories</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.categories.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Category</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.subcategories.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Subcategory</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.subsubcategories.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Sub SubCategory</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="credit-card"></i>
          <span class="menu-title text-truncate capitalize">Payment Gateways</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.gateway.razorpay') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">RazoyPay</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="package"></i>
          <span class="menu-title text-truncate capitalize">Orders & Return</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.orders.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">All</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.return_requests.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Return requests</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="pocket"></i>
          <span class="menu-title text-truncate capitalize">Wallets</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.wallets.sellers.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Seller</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="settings"></i>
          <span class="menu-title text-truncate capitalize">Settings</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.settings.frontend') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Frontend</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.settings.frontend') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">banner</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
          <i data-feather="shopping-bag"></i>
          <span class="menu-title text-truncate capitalize">franchises & others</span>
        </a>
        <ul class="menu-content">
          <li>
            <a href="{{ route('admin.franchises.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">All</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.franchises_products.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Stocks</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.franchises_orders.index') }}" class="d-flex align-items-center" target="_self">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate">Orders</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.hubs.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="box"></i>
          <span class="menu-title text-truncate capitalize">Hubs</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.packages.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="truck"></i>
          <span class="menu-title text-truncate capitalize">Packages</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.enquiries.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="mail"></i>
          <span class="menu-title text-truncate capitalize">Enquiries</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.coupons.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="tag"></i>
          <span class="menu-title text-truncate capitalize">Coupons</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.reviews.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="star"></i>
          <span class="menu-title text-truncate capitalize">reviews</span>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="{{ route('admin.brands.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="tag"></i>
          <span class="menu-title text-truncate capitalize">Brands</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.pages.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="file-text"></i>
          <span class="menu-title text-truncate capitalize">Pages</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.teams.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="users"></i>
          <span class="menu-title text-truncate capitalize">Teams</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.banners.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="image"></i>
          <span class="menu-title text-truncate capitalize">Banners</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.donation_posts.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="image"></i>
          <span class="menu-title text-truncate capitalize">donation posts</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.statuses.index') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="tag"></i>
          <span class="menu-title text-truncate capitalize">Statuses</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.geo.states') }}" class="d-flex align-items-center" target="_self">
          <i data-feather="map"></i>
          <span class="menu-title text-truncate capitalize">States</span>
        </a>
      </li>

      <li class="nav-item  ">
        <a href="#" class="d-flex align-items-center" target="_self">
          <i data-feather="file"></i>
          <span class="menu-title text-truncate capitalize">Blank</span>
        </a>
      </li>
    </ul>
  </div>
</div>
