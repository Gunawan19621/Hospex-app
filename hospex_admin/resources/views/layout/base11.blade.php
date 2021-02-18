<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		<link href="{{ asset('assets11/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="{{ asset('assets11/demo/demo11/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/demo/demo11/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="{{ asset('assets11/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="{{ asset('assets11/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

	{{-- <link href="{{ url('assets/vendors/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" /> --}}

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="{{ asset('assets11/demo/demo11/media/img/logo/favicon.ico') }}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">

						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-light ">
							<div class="m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="/" class="m-brand__logo-wrapper">
										<img alt="" src="{{ asset('assets11/hospexmetro.png')}}">
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<!-- END -->
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										
										<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{ asset('assets11/app/media/img//users/user4.jpg')}}" class="m--img-rounded m--marginless m--img-centered" alt="" />
												</span>
												<span class="m-nav__link-icon m-topbar__usericon  m--hide">
													<span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
												</span>
												<span class="m-topbar__username m--hide"></span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<div class="m-card-user m-card-user--skin-light">
															<div class="m-card-user__pic">
																<img src="{{ asset('assets11/app/media/img//users/user4.jpg')}}" class="m--img-rounded m--marginless" alt="" />
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
																<span class="m-card-user__email m--font-weight-300">{{ Auth::user()->email }}</span>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																
																<li class="m-nav__item">
																	<a class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
																		Logout
																	</a>
								
																	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																		@csrf
																	</form>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('/categories') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Category</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('/companies') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Company</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('events') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Events</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('exhibitors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Exhibitors</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('available-schedule') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Available Schedule</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('/areas') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Areas</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('/stands') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Stands</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('sponsors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Sponsors</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('visitors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Visitors</span></a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="{{ url('matches') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Match Requests</span></a>
							</li>
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- END: Subheader -->
					<div class="m-content">

						@yield('container')
						<!--End::Section-->
					</div>
                </div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								
							</ul>
						</div>
					</div>
				</div>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- end::Quick Sidebar -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->

		<!-- begin::Quick Nav -->

		<!--begin::Global Theme Bundle -->
		<script src="{{ asset('assets11/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets11/demo/demo11/base/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
        <script src="{{ asset('assets11/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets11/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets11/dataTables.rowsGroup.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets11/dataTables.rowGroup.min.js') }}" type="text/javascript"></script>
        @yield('require')
		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="{{ asset('assets11/app/js/dashboard.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets11/demo/demo11/custom/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets11/demo/demo11/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets11/demo/demo11/custom/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets11/demo/demo11/custom/crud/forms/widgets/dropzone.js') }}" type="text/javascript"></script>

		<!--end::Page Scripts -->
	@include('script-global')
	</body>

	<!-- end::Body -->
</html>