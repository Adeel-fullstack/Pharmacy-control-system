<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet"
    href="{{ asset('storage/vuexy-bootstrap-html-admin-template/assets/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/fonts/flag-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/css/rtl/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/css/rtl/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/swiper/swiper.css') }}" />
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet"
    href="{{ asset('vault/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet"
    href="{{ asset('vault/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{ asset('vault/assets/vendor/css/pages/cards-advance.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('vault/assets/vendor/js/helpers.js') }}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('vault/assets/js/config.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  {{-- Fontawesme --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
@livewireStyles

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
      <!-- Navbar -->

      <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="container-xxl">
          <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0" />
                  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                  <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0" />
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
              <i class="fas fa-times" style="font-size: 0.6em;"></i>
            </a>
          </div>

          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="fas fa-bars" style="font-size: 0.6em;"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Search -->
              <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
                <a class="nav-link search-toggler" href="javascript:void(0);">
                  <i class="fas fa-search" style="font-size: 0.6em"></i>
                </a>
              </li>
              <!-- /Search -->

              <!-- Style Switcher -->
              <li class="nav-item me-2 me-xl-0">
                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                  <i class="fas fa-ellipsis-h" style="font-size: 0.6em;"></i>
                </a>
              </li>
              <!--/ Style Switcher -->
              <!-- Quick links  -->
              <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-expanded="false">
                  <i class="fas fa-bolt" style="font-size: 0.6em"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0">
                  <div class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                      <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Add shortcuts">
                        <i class="fas fa-th" style="font-size: 0.6em;"></i>
                      </a>
                    </div>
                  </div>
                  <div class="dropdown-shortcuts-list scrollable-container">
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="fas fa-calendar" style="font-size: 0.6em"></i>
                        </span>
                        <a href="{{route('shortcuts.calendar')}}" class="stretched-link">Calendar</a>
                        <small class="text-muted mb-0">Appointments</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="fas fa-file-invoice" style="font-size: 0.6em"></i>
                        </span>
                        <a href={{route('billing.invoices')}} class="stretched-link">Invoice App</a>
                        <small class="text-muted mb-0">Manage Accounts</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="fas fa-users" style="font-size: 0.6em"></i>
                        </span>
                        <a href={{route('userman.manageusers')}} class="stretched-link">User App</a>
                        <small class="text-muted mb-0">Manage Users</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="fas fa-cog" style="font-size: 0.6em"></i>
                        </span>
                        <a href={{route('profile.settings')}} class="stretched-link">Setting</a>
                        <small class="text-muted mb-0">Account Settings</small>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Quick links -->
              <!-- Notification -->
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-expanded="false">
                  <i class="fas fa-bell" style="font-size: 0.6em"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                      <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Mark all as read">
                        <i class="fas fa-envelope-open" style="font-size: 0.6em"></i>
                      </a>
                    </div>
                  </li>
                  <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ asset('storage/storage/assets/img/avatars/1.png') }}" alt
                                class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                            <p class="mb-0">Won the monthly best seller gold badge</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Charles Franklin</h6>
                            <p class="mb-0">Accepted your connection</p>
                            <small class="text-muted">12hr ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ asset('vault/assets/img/avatars/2.png') }}" alt
                                class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New Message ✉️</h6>
                            <p class="mb-0">You have new message from Natalie</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i
                                  class="fas fa-shopping-cart" style="font-size: 0.6em"></i>
                              </span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                            <p class="mb-0">ACME Inc. made new order $1,154</p>
                            <small class="text-muted">1 day ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ asset('vault/assets/img/avatars/9.png') }}" alt
                                class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Application has been approved 🚀</h6>
                            <p class="mb-0">Your ABC project application has been approved.</p>
                            <small class="text-muted">2 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="fas fa-chart-pie"
                                  style="font-size: 0.6em"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Monthly report is generated</h6>
                            <p class="mb-0">July monthly financial report is generated</p>
                            <small class="text-muted">3 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ asset('vault/assets/img/avatars/5.png') }}" alt
                                class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Send connection request</h6>
                            <p class="mb-0">Peter sent you connection request</p>
                            <small class="text-muted">4 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ asset('vault/assets/img/avatars/6.png') }}" alt
                                class="h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Anna</h6>
                            <p class="mb-0">Check your inbox for more details</p>
                            <small class="text-muted">1 week ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                class="fas fa-times"></span></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>


              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('vault/assets/img/avatars/1.png') }}" alt class="h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="{{ asset('pages-account-settings-account.html') }}">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="{{ asset('vault/assets/img/avatars/1.png') }}" alt
                              class="h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href={{route('profile.myprofile')}}>
                      <i class="fas fa-user-check" style="font-size: 0.6em;"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href={{route('profile.settings')}}>
                      <i class="fas fa-cog" style="font-size: 0.6em;"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href={{route('profile.help')}}>
                      <i class="fas fa-life-ring" style="font-size: 0.6em;"></i>
                      <span class="align-middle">Help</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href={{route('profile.faq')}}>
                      <i class="fas fa-question-circle" style="font-size: 0.6em;"></i>
                      <span class="align-middle">FAQ</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#" target="_blank">
                      <i class="fas fa-sign-out-alt" style="font-size: 0.6em;"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->


              <!-- Search Small Screens -->
              <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
                <input type="text" class="form-control search-input border-0" placeholder="Search..."
                  aria-label="Search..." />
                <i class="fas fa-times" style="font-size: 0.6em;" class="search-toggler cursor-pointer"></i>
              </div>
          </div>
      </nav>

      <!-- / Navbar -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
         <div class="content-wrapper pt-0">
          <!-- Menu -->
          <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
            <div class="container-xxl d-flex h-100">
              <ul class="menu-inner">
                <!-- Dashboards -->
                <li class="menu-item active">
                  <a href={{route('dashboard')}} class="menu-link">
                    <i class="fas fa-home" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                  </a>
                </li>

                <!-- Stock -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="fas fa-warehouse" style="font-size: 0.6em;"></i>
                    <div data-i18n="Stock" style="margin-left: 3px;">Stock</div> <!-- Added margin here -->
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href={{ route('stock.new')}} class="menu-link">
                        <i class="fas fa-plus-circle" style="font-size: 0.6em;"></i>
                        <div data-i18n="New Stock" style="margin-left: 3px;">New Stock</div> <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{ route('stock.list') }} class="menu-link">
                        <i class="fas fa-list" style="font-size: 0.6em;"></i>
                        <div data-i18n="Stock List" style="margin-left: 3px;">Stock List</div>
                        <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{ route('stock.required') }} class="menu-link">
                        <i class="fas fa-exclamation-circle" style="font-size: 0.6em;"></i>
                        <div data-i18n="Stock Required" style="margin-left: 3px;">Stock Required</div>
                        <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{ route('stock.suggestions') }} class="menu-link">
                        <i class="fas fa-lightbulb" style="font-size: 0.6em;"></i>
                        <div data-i18n="Suggestion" style="margin-left: 3px;">Suggestion</div>
                        <!-- Added margin here -->
                      </a>
                    </li>
                    <!-- New Companies Option -->
                    <li class="menu-item">
                      <a href={{ route('stock.companies') }} class="menu-link">
                        <i class="fas fa-building" style="font-size: 0.6em;"></i>
                        <div data-i18n="Companies" style="margin-left: 3px;">Companies</div> <!-- Added margin here -->
                      </a>
                    </li>
                    <!-- New Distributors Option -->
                    <li class="menu-item">
                      <a href={{ route('stock.distributors') }} class="menu-link">
                        <i class="fas fa-truck" style="font-size: 0.6em;"></i>
                        <div data-i18n="Distributors" style="margin-left: 3px;">Distributors</div>
                        <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{ route('stock.type') }} class="menu-link">
                        <i class="fas fa-th-list" style="font-size: 0.6em;"></i>
                        <div data-i18n="Type" style="margin-left: 3px;">Type</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href={{ route('stock.email-users') }} class="menu-link">
                      <i class="fa-solid fa-envelope" style="font-size:0.6rem;"></i>
                        <div data-i18n="Email" style="margin-left: 3px;">Email</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Sales -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-chart-line" style="font-size: 0.6em"></i>
                    <!-- FontAwesome icon for chart -->
                    <div data-i18n="Sales">Sales</div> <!-- Added margin here -->
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href={{Route('sales.new')}} class="menu-link">
                        <i class="fas fa-plus-circle" style="font-size: 0.6em;"></i>
                        <div data-i18n="New Sales" style="margin-left: 3px;">New Sales</div> <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{Route('sales.sales')}} class="menu-link">
                        <i class="menu-icon fas fa-dollar-sign" style="font-size: 0.6em"></i>
                        <!-- FontAwesome dollar sign icon -->
                        <div data-i18n="Sales" style="margin-left: 3px;">Sales</div> <!-- Added margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{route('customer')}}" class="menu-link">
                        <i class="menu-icon fas fa-users" style="font-size: 0.6em"></i>
                        <!-- FontAwesome icon for customers -->
                        <div data-i18n="Customers" style="margin-left: 3px;">Customers</div> <!-- Added margin here -->
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{route('sales.history')}}" class="menu-link">
                        <i class="menu-icon fas fa-users" style="font-size: 0.6em"></i>
                        <!-- FontAwesome icon for customers -->
                        <div data-i18n="Sale History" style="margin-left: 3px;">Sales History</div> <!-- Added margin here -->
                      </a>
                    </li>
                  </ul>
                </li>



                <!-- Employees -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="fas fa-users fa-lg menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Employees">Employees</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href={{Route('employee.new')}} class="menu-link">
                        <i class="fas fa-user-plus" style="font-size: 0.6em;" class="menu-icon tf-icons"></i>
                        <div data-i18n="New Employee" style="margin-left: 3px;">New Employee</div>
                        <!-- Add margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{Route('employee.all')}} class="menu-link">
                        <i class="fas fa-list" style="font-size: 0.6em;" class="menu-icon tf-icons"></i>
                        <div data-i18n="All Employee" style="margin-left: 3px;">All Employee</div>
                        <!-- Add margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{Route('employee.designation')}} class="menu-link">
                        <i class="fas fa-user-tag" style="font-size: 0.6em;"></i>
                        <div data-i18n="Designation" style="margin-left: 3px;">Designation</div>
                        <!-- Add margin here -->
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href={{Route('employee.department')}} class="menu-link">
                        <i class="fas fa-user-tag" style="font-size: 0.6em;"></i>
                        <div data-i18n="Department" style="margin-left: 3px;">Department</div>
                        <!-- Add margin here -->
                      </a>
                    </li>
                  </ul>
                </li>



                <!-- Customers -->
                <li class="menu-item">
                  <a href="{{route('customer')}}" class="menu-link">
                    <i class="fas fa-users" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Customers" style="margin-left: 3px;">Customers</div> <!-- Added margin here -->
                  </a>
                </li>

                <!-- User Management -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="fas fa-user-shield" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                      <div data-i18n="User Management" style="margin-left: 3px;">User Management</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item">
                          <a href={{route('userman.adduser')}} class="menu-link">
                              <i class="fas fa-user-plus" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                              <div data-i18n="Add User" style="margin-left: 3px;">Add User</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href={{route('userman.manageusers')}} class="menu-link">
                              <i class="fas fa-user-edit" style="font-size: 0.6em;"></i>
                              <div data-i18n="Manage Users" style="margin-left: 3px;">Manage Users</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href={{route('userman.roles')}} class="menu-link">
                              <i class="fas fa-user-tag" style="font-size: 0.6em;"></i>
                              <div data-i18n="Roles" style="margin-left: 3px;">Roles</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href={{route('userman.permissions')}} class="menu-link">
                              <i class="fas fa-user-lock" style="font-size: 0.6em;"></i>
                              <div data-i18n="Permissions" style="margin-left: 3px;">Permissions</div>
                          </a>
                      </li>
                  </ul>
                </li>
                <!-- Billing -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="fas fa-file-invoice" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Billing" style="margin-left: 3px;">Billing</div> <!-- Added margin here -->
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href={{route('billing.invoices')}} class="menu-link">
                        <i class="fas fa-plus" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                        <div data-i18n="Invoices" style="margin-left: 3px;">Invoices</div> <!-- Added margin here -->
                      </a>
                    </li>
                  </ul> 
                </li>

                <!-- General -->
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="fas fa-cogs" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="General" style="margin-left: 3px;">General</div> <!-- Changed text to General -->
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href={{route('general.general')}} class="menu-link">
                        <i class="fas fa-list-alt" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                        <div data-i18n="General" style="margin-left: 3px;">General</div> <!-- Changed text to General in dropdown -->
                      </a>
                    </li>
                  <li class="menu-item">
                      <a href={{route('general.paygate')}} class="menu-link">
                        <i class="fas fa-list-alt" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                        <div data-i18n="Payment Gateway" style="margin-left: 3px;">Payment Gateway</div> <!-- Changed text to General in dropdown -->
                      </a>
                    </li>
                  </ul> 
                </li>

                <!-- Sale Bill -->
                <li class="menu-item">
                  <a href="{{route('salebill')}}" class="menu-link">
                    <i class="fa fa-file-invoice-dollar" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Sale Bill" style="margin-left: 3px;">Sale Bill</div> <!-- Added margin here -->
                  </a>
                </li>
                

                <!-- Log Out -->
                <li class="menu-item">
                  <a href="3" class="menu-link">
                    <i class="fas fa-power-off" class="menu-icon tf-icons" style="font-size: 0.6em"></i>
                    <div data-i18n="Log Out" style="margin-left: 3px;">Log Out</div> <!-- Added margin here -->
                  </a>
                </li>
              </ul>
            </div>
          </aside>

          {{-- Menu --}}
          {{$slot}}
          @livewireScripts
          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                </div>
                <div>
                  <a href="https://themeforest.net/licenses/standard" class="footer-link me-4"
                    target="_blank">License</a>
                  <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More
                    Themes</a>
                  <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank"
                    class="footer-link me-4">Documentation</a>
                  <a href="https://pixinvent.ticksy.com/" target="_blank"
                    class="footer-link d-none d-sm-inline-block">Support</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>

      <!--/ Layout container -->
    </div>
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('vault/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

  <script src="{{ asset('vault/assets/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

  <script src="{{ asset('vault/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('vault/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/swiper/swiper.js') }}"></script>
  <script src="{{ asset('vault/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('vault/assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('vault/assets/js/dashboards-analytics.js') }}"></script>
</body>

</html>