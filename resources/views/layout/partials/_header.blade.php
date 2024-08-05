<div id="kt_header" class="header header-fixed">
    <div class="container d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-stretch mr-3">
            <div class="header-logo">
                <a href="index.html">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-letter-9.png') }}" class="logo-default max-h-40px" />
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-letter-1.png') }}" class="logo-sticky max-h-40px" />
                </a>
            </div>
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{ route('dashboard.index') }}" class="menu-link">
                                <span class="menu-text">Dashboard</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                            <a  href="{{ route('container.index') }}" class="menu-link">
                                <span class="menu-text">Container</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>

                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{ route('shipment.index') }}" class="menu-link">
                                <span class="menu-text">Shipments</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                            <a  href="{{ route('users.index') }}" class="menu-link">
                                <span class="menu-text">Investors</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('investor.detail')}}" class="menu-link">
                                <span class="menu-text">Pages</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="topbar">
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                        <form method="get" class="quick-search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search..." />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </form>

                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>

            </div>
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        <img class="h-20px w-20px rounded-sm" src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt="" />
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <ul class="navi navi-hover py-4">
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt="" />
                                </span>
                                <span class="navi-text">English</span>
                            </a>
                        </li>
                        <li class="navi-item active">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ asset('assets/media/svg/flags/128-spain.svg') }}" alt="" />
                                </span>
                                <span class="navi-text">Spanish</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ asset('assets/media/svg/flags/162-germany.svg') }}" alt="" />
                                </span>
                                <span class="navi-text">German</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ asset('assets/media/svg/flags/063-japan.svg') }}" alt="" />
                                </span>
                                <span class="navi-text">Japanese</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{ asset('assets/media/svg/flags/195-france.svg') }}" alt="" />
                                </span>
                                <span class="navi-text">French</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                        <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">Sean</span>
                        <span class="symbol symbol-35">
                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">S</span>
                        </span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <div class="d-flex align-items-center p-8 rounded-top">
                        <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                            <img src="{{ asset('assets/media/users/300_21.jpg') }}" alt="" />
                        </div>
                        <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">Sean Stone</div>
                        <span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span>
                    </div>
                    <div class="separator separator-solid"></div>
                    <div class="navi navi-spacer-x-0 pt-5">

                        <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-calendar-3 text-success"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Profile</div>
                                    <div class="text-muted">Account settings and more
                                        <span class="label label-light-danger label-inline font-weight-bold">update</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="custom/apps/user/profile-3.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-mail text-warning"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Messages</div>
                                    <div class="text-muted">Inbox and tasks</div>
                                </div>
                            </div>
                        </a>

                        <a href="custom/apps/user/profile-2.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-rocket-1 text-danger"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Activities</div>
                                    <div class="text-muted">Logs and notifications</div>
                                </div>
                            </div>
                        </a>
                        <a href="custom/apps/userprofile-1/overview.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-hourglass text-primary"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Tasks</div>
                                    <div class="text-muted">latest tasks and projects</div>
                                </div>
                            </div>
                        </a>
                        <div class="navi-separator mt-3"></div>
                        <div class="navi-footer px-8 py-5">
                            <a href="custom/user/login-v2.html" target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a>
                            <a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean font-weight-bold">Upgrade Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <div class="d-flex flex-column">
                    @hasSection('pagetitle')
                        @yield('pagetitle')
                    @endif

                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Latest Updated</a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
            </div>
        </div>
    </div>
</div>
