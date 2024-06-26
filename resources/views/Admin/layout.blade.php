<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tadbeer CSS Program</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff"> --}}
    <!-- Retina iPad Touch Icon-->
    {{-- <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff"> --}}
    <!-- Retina iPhone Touch Icon-->
    {{-- <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff"> --}}
    <!-- Standard iPad Touch Icon-->
    {{-- <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff"> --}}
    <!-- Standard iPhone Touch Icon-->
    {{-- <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff"> --}}
    <!-- Styles -->
    <link href="{{ asset('assets/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="#">
                            <!-- <img src="assets/images/logo.png" alt="" /> -->
                            <span>Tadbeer CSS Program</span></a>
                    </div>
                    <li class="label">Main</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span
                                class="badge badge-primary">2</span> <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ url('shop-panel') }}">Dashboard</a></li>
                            <li><a href="{{ url('shop-add-user') }}">Add User</a></li>
                            <li><a href="{{ url('shop-view-users') }}">View Users</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="{{'shop-panel'}}"><i class="ti-home"></i> Dashboard </a>
                    </li> --}}

                    <li class="label">Apps</li>

                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Profile</a>
                        <ul>
                            <li><a href="#">Profile Setting</a></li>
                            <li><a href="#">Social Media</a></li>
                            <li><a href="#">Team Members</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Students</a>
                        <ul>
                            <li><a href="#">Registrations</a></li>
                        </ul>
                    </li> --}}



                    {{-- <li><a href="#"><i class="ti-file"></i>Registrations</a></li> --}}
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Orders</a>
                        <ul>
                            <li><a href="#">New Order</a></li>
                            <li><a href="#">List Orders</a></li>
                        </ul>
                    </li>

                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Sliders</a>
                        <ul>
                            <li><a href="{{ url('admin/add-slider') }}">Create</a></li>
                            <li><a href="{{ url('admin/view-sliders') }}">All Sliders</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="{{url('admin/view-tutorials')}}"><i class="ti-file"></i>Tutorials</a></li> --}}

                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>News & Updates</a>
                        <ul>
                            <li><a href="{{ url('admin/add-news-and-update') }}">Create</a></li>
                            <li><a href="{{ url('admin/view-news-and-updates') }}">All Listing</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>SMS</a>
                        <ul>
                            <li><a href="#">Signal Message</a></li>
                            <li><a href="#">Group Messages</a></li>
                            <li><a href="#">Messages History</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Email</a>
                        <ul>
                            <li><a href="#">Singel Email</a></li>
                            <li><a href="#">Group Emails</a></li>
                            <li><a href="{{ url('admin/view-sent-email') }}">Email History</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Others</a>
                        <ul>
                            <li><a href="{{ url('admin/view-contact-messages') }}">Contact Messages</a></li>
                            <li><a href="{{ url('admin/view-programs') }}">Programs</a></li>
                            <li><a href="{{ url('admin/view-admissions') }}">Admissions</a></li>
                            <li><a href="{{ url('admin/view-email-export') }}">Email Exports</a></li>
                            <li><a href="{{ url('admin/view-mobile-no-export') }}">Mobile No Exports</a></li>
                            <li><a href="#" onclick="return confirm('Do You Want to Export Database?')">Database
                                    Backup</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Charts <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chartjs.html">Chartjs</a></li>
                            <li><a href="chartist.html">Chartist</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                            <li><a href="chart-sparkline.html">Sparkle</a></li>
                            <li><a href="chart-knob.html">Knob</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calender </a></li> --}}
                    {{-- <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li> --}}
                    {{-- <li><a href="app-profile.html"><i class="ti-user"></i> Profile</a></li> --}}
                    {{-- <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li> --}}
                    {{-- <li class="label">Features</li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>

                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>

                            <li><a href="ui-list-group.html">List Group</a></li>

                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>

                        </ul>
                    </li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="uc-calendar.html">Calendar</a></li>
                            <li><a href="uc-carousel.html">Carousel</a></li>
                            <li><a href="uc-weather.html">Weather</a></li>
                            <li><a href="uc-datamap.html">Datamap</a></li>
                            <li><a href="uc-todo-list.html">To do</a></li>
                            <li><a href="uc-scrollable.html">Scrollable</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                            <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                            <li><a href="uc-nestable.html">Nestable</a></li>

                            <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                            <li><a href="uc-rating-jRate.html">jRate</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="table-basic.html">Basic</a></li>

                            <li><a href="table-export.html">Datatable Export</a></li>
                            <li><a href="table-row-select.html">Datatable Row Select</a></li>
                            <li><a href="table-jsgrid.html">Editable </a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="font-themify.html">Themify</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="gmaps.html">Basic</a></li>
                            <li><a href="vector-map.html">Vector Map</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="label">Form</li> --}}
                    {{-- <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li> --}}
                    {{-- <li class="label">Extra</li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="invoice.html">Basic</a></li>
                            <li><a href="invoice-editable.html">Editable</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-reset-password.html">Forgot password</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li> --}}
                    <li><a><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>

                    {{-- ////////////////////////////////////////////////////////////////////////////// --}}

                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- //////////////////////////////////////////////////////////////////////////////// --}}

                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="#">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ///////////////////////////////////////////////////// --}}

                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">John
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            {{-- <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li> --}}

                                            {{-- <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li> --}}

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Change Password</span>
                                                </a>
                                            </li>

                                            <li>

                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

    <!-- jquery vendor -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('assets/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('assets/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/calendar-2/pignose.init.js') }}"></script>


    {{-- datatable --}}

    <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script>

    <script src="{{ asset('assets/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('assets/js/dashboard2.js') }}"></script>
</body>

</html>
