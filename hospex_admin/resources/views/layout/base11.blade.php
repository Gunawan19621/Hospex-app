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
		<link href="{{ url('assets11/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="{{ url('assets11/demo/demo11/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/demo/demo11/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		<link href="{{ url('assets11/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="{{ url('assets11/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

	{{-- <link href="{{ url('assets/vendors/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" /> --}}

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="{{ url('assets11/demo/demo11/media/img/logo/favicon.ico') }}" />
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
									<a href="index.html" class="m-brand__logo-wrapper">
										<img alt="" src="{{ url('assets11/demo/demo11/media/img/logo/logo.png') }}" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
										<a href="#" class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
											<span>Dashboard</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav">
															<li class="m-nav__section m-nav__section--first m--hide">
																<span class="m-nav__section-text">Quick Menu</span>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-share"></i>
																	<span class="m-nav__link-text">Human Resources</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-chat-1"></i>
																	<span class="m-nav__link-text">Customer Relationship</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-info"></i>
																	<span class="m-nav__link-text">Order Processing</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																	<span class="m-nav__link-text">Accounting</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit">
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-chat-1"></i>
																	<span class="m-nav__link-text">Customer Relationship</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-info"></i>
																	<span class="m-nav__link-text">Order Processing</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<!-- END -->

									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>

									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" m-dropdown-toggle="click" id="m_quicksearch"
										 m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="flaticon-search-1"></i></span></span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
															<div class="m-dropdown__content">
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__notifications m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-icon">
													<span class="m-nav__link-icon-wrapper"><i class="flaticon-alarm"></i></span>
													<span class="m-nav__link-badge m-badge m-badge--success">3</span>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<span class="m-dropdown__header-title">9 New</span>
														<span class="m-dropdown__header-subtitle">User Notifications</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alerts
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																					<span class="m-list-timeline__text">12 new users registered</span>
																					<span class="m-list-timeline__time">Just now</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
																					<span class="m-list-timeline__time">14 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">New invoice received</span>
																					<span class="m-list-timeline__time">20 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
																					<span class="m-list-timeline__time">1 hr</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
																					<span class="m-list-timeline__time">2 hrs</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
																					<span class="m-list-timeline__time">7 hrs</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">Production server down</span>
																					<span class="m-list-timeline__time">3 hrs</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">Production server up</span>
																					<span class="m-list-timeline__time">5 hrs</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">New order received</a>
																					<span class="m-list-timeline__time">Just now</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																					<a href="" class="m-list-timeline__text">New invoice received</a>
																					<span class="m-list-timeline__time">20 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">Production server up</a>
																					<span class="m-list-timeline__time">5 hrs</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">New order received</a>
																					<span class="m-list-timeline__time">7 hrs</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">System shutdown</a>
																					<span class="m-list-timeline__time">11 mins</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">Production server down</a>
																					<span class="m-list-timeline__time">3 hrs</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">All caught up!<br>No new logs.</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<span class="m-nav__link-icon-wrapper"><i class="flaticon-share"></i></span>
													<span class="m-nav__link-badge m-badge m-badge--brand">5</span>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<span class="m-dropdown__header-title">Quick Actions</span>
														<span class="m-dropdown__header-subtitle">Shortcuts</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="m-scrollable" data-scrollable="false" data-height="380" data-mobile-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-file"></i>
																			<span class="m-nav-grid__text">Generate Report</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-time"></i>
																			<span class="m-nav-grid__text">Add New Event</span>
																		</a>
																	</div>
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-folder"></i>
																			<span class="m-nav-grid__text">Create New Task</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-clipboard"></i>
																			<span class="m-nav-grid__text">Completed Tasks</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{ url('assets11/app/media/img//users/user4.jpg')}}" class="m--img-rounded m--marginless m--img-centered" alt="" />
												</span>
												<span class="m-nav__link-icon m-topbar__usericon  m--hide">
													<span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
												</span>
												<span class="m-topbar__username m--hide">Nick</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<div class="m-card-user m-card-user--skin-light">
															<div class="m-card-user__pic">
																<img src="{{ url('assets11/app/media/img//users/user4.jpg')}}" class="m--img-rounded m--marginless" alt="" />
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">Mark Andre</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">mark.andre@gmail.com</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">My Profile</span>
																				<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">Activity</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">Messages</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">FAQ</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">Support</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="snippets/pages/user/login-1.html" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li id="m_quick_sidebar_toggle" class="m-nav__item m-topbar__quick-sidebar">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
											</a>
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
							<li class="m-menu__section m-menu__section--first">
								<h4 class="m-menu__section-text">Departments</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							{{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Resources</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Resources</span></span></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Timesheet</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Payroll</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Contacts</span></a></li>
									</ul>
								</div>
							</li> --}}
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('events') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Events</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('exhibitors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Exhibitors</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('visitors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Visitors</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('matches') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Match Requests</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('sponsors') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Sponsors</span></a></li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-graphic-1"></i><span
									 class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Master</span> <span class="m-menu__link-badge"><span class="m-badge m-badge--accent">3</span></span> </span></span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" m-menu-link-redirect="1"><span class="m-menu__link"><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Masters</span> <span
														 class="m-menu__link-badge"><span class="m-badge m-badge--accent">3</span></span> </span></span></span></li>
										{{-- <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__link-text">Reports</span></a></li> --}}
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__link-text">Company Master</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('/categories') }}" class="m-menu__link "><span class="m-menu__link-text">Category</span></a></li>
													<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('/companies') }}" class="m-menu__link "><span class="m-menu__link-text">Company</span></a></li>
													{{-- <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__link-text">Done</span></a></li>
													<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__link-text">Archive</span></a></li> --}}
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('/areas') }}" class="m-menu__link "><span class="m-menu__link-text">Areas</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ url('/stands') }}" class="m-menu__link "><span class="m-menu__link-text">Stands</span></a></li>
									</ul>
								</div>
							</li>
							{{-- <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-light"></i><span class="m-menu__link-text">Administration</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">Management</span></a></li> --}}
							{{-- <li class="m-menu__section ">
								<h4 class="m-menu__section-text">Reports</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-graphic"></i><span class="m-menu__link-text">Accounting</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-network"></i><span class="m-menu__link-text">Products</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-network"></i><span class="m-menu__link-text">Sales</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-alert"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Bills</span>
											<span class="m-menu__link-badge"><span class="m-badge m-badge--danger">12</span></span> </span></span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-technology"></i><span class="m-menu__link-text">IPO</span></a></li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">System</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-clipboard"></i><span class="m-menu__link-text">Applications</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Applications</span></span></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Audit</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Notifications</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Messages</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-computer"></i><span class="m-menu__link-text">Modules</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Modules</span></span></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Logs</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Errors</span></a></li>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Configuration</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-cogwheel"></i><span class="m-menu__link-text">Files</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-lifebuoy"></i><span class="m-menu__link-text">Security</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-text">Options</span></a></li> --}}
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					{{-- <div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">Dashboard</h3>
							</div>
							<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
							</div>
						</div>
					</div> --}}

					<!-- END: Subheader -->
					<div class="m-content">

						<!--begin:: Widgets/Stats-->
						{{-- <div class="m-portlet ">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">
									<div class="col-md-12 col-lg-6 col-xl-3">

										<!--begin::Total Profit-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Total Frofit
												</h4><br>
												<span class="m-widget24__desc">
													All Customs Value
												</span>
												<span class="m-widget24__stats m--font-brand">
													$18M
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													78%
												</span>
											</div>
										</div>

										<!--end::Total Profit-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">

										<!--begin::New Feedbacks-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													New Feedbacks
												</h4><br>
												<span class="m-widget24__desc">
													Customer Review
												</span>
												<span class="m-widget24__stats m--font-info">
													1349
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													84%
												</span>
											</div>
										</div>

										<!--end::New Feedbacks-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">

										<!--begin::New Orders-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													New Orders
												</h4><br>
												<span class="m-widget24__desc">
													Fresh Order Amount
												</span>
												<span class="m-widget24__stats m--font-danger">
													567
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													69%
												</span>
											</div>
										</div>

										<!--end::New Orders-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">

										<!--begin::New Users-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													New Users
												</h4><br>
												<span class="m-widget24__desc">
													Joined New User
												</span>
												<span class="m-widget24__stats m--font-success">
													276
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													90%
												</span>
											</div>
										</div>

										<!--end::New Users-->
									</div>
								</div>
							</div>
						</div> --}}

						<!--end:: Widgets/Stats-->

						<!--Begin::Section-->
						{{-- <div class="row">
							<div class="col-xl-4">

								<!--begin:: Widgets/New Users-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													New Users
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
														Today
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
														Month
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget4_tab1_content">

												<!--begin::Widget 14-->
												<div class="m-widget4">

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_4.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Anna Strong
															</span><br>
															<span class="m-widget4__sub">
																Visual Designer,Google Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_14.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Milano Esco
															</span><br>
															<span class="m-widget4__sub">
																Product Designer, Apple Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_11.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
															<span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_1.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Wiltor Delton
															</span><br>
															<span class="m-widget4__sub">
																Project Manager, Amazon Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_5.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Stone
															</span><br>
															<span class="m-widget4__sub">
																Visual Designer, Github Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->
												</div>

												<!--end::Widget 14-->
											</div>
											<div class="tab-pane" id="m_widget4_tab2_content">

												<!--begin::Widget 14-->
												<div class="m-widget4">

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_2.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Kristika Bold
															</span><br>
															<span class="m-widget4__sub">
																Product Designer,Apple Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_13.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Ron Silk
															</span><br>
															<span class="m-widget4__sub">
																Release Manager, Loop Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_9.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
															<span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_2.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Wiltor Delton
															</span><br>
															<span class="m-widget4__sub">
																Project Manager, Amazon Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->

													<!--end::Widget 14 Item-->

													<!--begin::Widget 14 Item-->
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="assets/app/media/img/users/100_8.jpg" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																Nick Bold
															</span><br>
															<span class="m-widget4__sub">
																Web Developer, Facebook Inc
															</span>
														</div>
														<div class="m-widget4__ext">
															<a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
														</div>
													</div>

													<!--end::Widget 14 Item-->
												</div>

												<!--end::Widget 14-->
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/New Users-->
							</div>
							<div class="col-xl-4">

								<!--begin:: Widgets/Inbound Bandwidth-->
								<div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Inbound Bandwidth
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
														Today
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
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
									<div class="m-portlet__body">

										<!--begin::Widget5-->
										<div class="m-widget20">
											<div class="m-widget20__number m--font-success">670</div>
											<div class="m-widget20__chart" style="height:160px;">
												<canvas id="m_chart_bandwidth1"></canvas>
											</div>
										</div>

										<!--end::Widget 5-->
									</div>
								</div>

								<!--end:: Widgets/Inbound Bandwidth-->
								<div class="m--space-30"></div>

								<!--begin:: Widgets/Outbound Bandwidth-->
								<div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Outbound Bandwidth
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
														Today
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
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
									<div class="m-portlet__body">

										<!--begin::Widget5-->
										<div class="m-widget20">
											<div class="m-widget20__number m--font-warning">340</div>
											<div class="m-widget20__chart" style="height:160px;">
												<canvas id="m_chart_bandwidth2"></canvas>
											</div>
										</div>

										<!--end::Widget 5-->
									</div>
								</div>

								<!--end:: Widgets/Outbound Bandwidth-->
							</div>
							<div class="col-xl-4">

								<!--begin:: Widgets/Top Products-->
								<div class="m-portlet m-portlet--full-height m-portlet--fit ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Top Products
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
														All
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
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
									<div class="m-portlet__body">

										<!--begin::Widget5-->
										<div class="m-widget4 m-widget4--chart-bottom" style="min-height: 480px">
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo3.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														Phyton
													</span><br>
													<span class="m-widget4__sub">
														A Programming Language
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">+$17</span>
												</span>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo1.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														FlyThemes
													</span><br>
													<span class="m-widget4__sub">
														A Let's Fly Fast Again Language
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">+$300</span>
												</span>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__img m-widget4__img--logo">
													<img src="assets/app/media/img/client-logos/logo4.png" alt="">
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__title">
														Starbucks
													</span><br>
													<span class="m-widget4__sub">
														Good Coffee & Snacks
													</span>
												</div>
												<span class="m-widget4__ext">
													<span class="m-widget4__number m--font-brand">+$300</span>
												</span>
											</div>
											<div class="m-widget4__chart m-portlet-fit--sides m--margin-top-20" style="height:260px;">
												<canvas id="m_chart_trends_stats_2"></canvas>
											</div>
										</div>

										<!--end::Widget 5-->
									</div>
								</div>

								<!--end:: Widgets/Top Products-->
							</div>
						</div> --}}

						<!--End::Section-->

						<!--Begin::Section-->
						{{-- <div class="row">
							<div class="col-xl-6">

								<!--begin:: Widgets/Support Cases-->
								<div class="m-portlet  m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Support Cases
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
														<i class="la la-ellipsis-h m--font-brand"></i>
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">Quick Actions</span>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
																		</li>
																		<li class="m-nav__separator m-nav__separator--fit">
																		</li>
																		<li class="m-nav__item">
																			<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
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
									<div class="m-portlet__body">
										<div class="m-widget16">
											<div class="row">
												<div class="col-md-5">
													<div class="m-widget16__head">
														<div class="m-widget16__item">
															<span class="m-widget16__sceduled">
																Type
															</span>
															<span class="m-widget16__amount m--align-right">
																Amount
															</span>
														</div>
													</div>
													<div class="m-widget16__body">

														<!--begin::widget item-->
														<div class="m-widget16__item">
															<span class="m-widget16__date">
																EPS
															</span>
															<span class="m-widget16__price m--align-right m--font-brand">
																+78,05%
															</span>
														</div>

														<!--end::widget item-->

														<!--begin::widget item-->
														<div class="m-widget16__item">
															<span class="m-widget16__date">
																PDO
															</span>
															<span class="m-widget16__price m--align-right m--font-accent">
																21,700
															</span>
														</div>

														<!--end::widget item-->

														<!--begin::widget item-->
														<div class="m-widget16__item">
															<span class="m-widget16__date">
																OPL Status
															</span>
															<span class="m-widget16__price m--align-right m--font-danger">
																Negative
															</span>
														</div>

														<!--end::widget item-->

														<!--begin::widget item-->
														<div class="m-widget16__item">
															<span class="m-widget16__date">
																Priority
															</span>
															<span class="m-widget16__price m--align-right m--font-brand">
																+500,200
															</span>
														</div>

														<!--end::widget item-->

														<!--begin::widget item-->
														<div class="m-widget16__item">
															<span class="m-widget16__date">
																Net Prifit
															</span>
															<span class="m-widget16__price m--align-right m--font-brand">
																$18,540,60
															</span>
														</div>

														<!--end::widget item-->
													</div>
												</div>
												<div class="col-md-7">
													<div class="m-widget16__stats">
														<div class="m-widget16__visual">
															<div id="m_chart_support_tickets" style="height: 180px">
															</div>
														</div>
														<div class="m-widget16__legends">
															<div class="m-widget16__legend">
																<span class="m-widget16__legend-bullet m--bg-info"></span>
																<span class="m-widget16__legend-text">20% Margins</span>
															</div>
															<div class="m-widget16__legend">
																<span class="m-widget16__legend-bullet m--bg-accent"></span>
																<span class="m-widget16__legend-text">80% Profit</span>
															</div>
															<div class="m-widget16__legend">
																<span class="m-widget16__legend-bullet m--bg-danger"></span>
																<span class="m-widget16__legend-text">10% Lost</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Support Stats-->
							</div>
							<div class="col-xl-6">

								<!--begin:: Finance Stats-->
								<div class="m-portlet  m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Finance Stats
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
														<i class="la la-ellipsis-h m--font-brand"></i>
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">Quick Actions</span>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
																		</li>
																		<li class="m-nav__separator m-nav__separator--fit">
																		</li>
																		<li class="m-nav__item">
																			<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
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
									<div class="m-portlet__body">
										<div class="m-widget1 m-widget1--paddingless">
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">IPO Margin</h3>
														<span class="m-widget1__desc">Awerage IPO Margin</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-accent">+24%</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">Payments</h3>
														<span class="m-widget1__desc">Yearly Expenses</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-info">+$560,800</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">Logistics</h3>
														<span class="m-widget1__desc">Overall Regional Logistics</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-warning">-10%</span>
													</div>
												</div>
											</div>
											<div class="m-widget1__item">
												<div class="row m-row--no-padding align-items-center">
													<div class="col">
														<h3 class="m-widget1__title">Expenses</h3>
														<span class="m-widget1__desc">Balance</span>
													</div>
													<div class="col m--align-right">
														<span class="m-widget1__number m--font-danger">$345,000</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--end:: Finance Stats-->
							</div>
						</div> --}}

						<!--End::Section-->

						<!--Begin::Section-->
						{{-- <div class="row">
							<div class="col-xl-6 col-lg-12">

								<!--Begin::Portlet-->
								<div class="m-portlet  m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Recent Activities
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
														<i class="la la-ellipsis-h m--font-brand"></i>
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__section m-nav__section--first">
																			<span class="m-nav__section-text">Quick Actions</span>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
																		</li>
																		<li class="m-nav__separator m-nav__separator--fit">
																		</li>
																		<li class="m-nav__item">
																			<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
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
									<div class="m-portlet__body">
										<div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">

											<!--Begin::Timeline 2 -->
											<div class="m-timeline-2">
												<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
													<div class="m-timeline-2__item">
														<span class="m-timeline-2__item-time">10:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-danger"></i>
														</div>
														<div class="m-timeline-2__item-text  m--padding-top-5">
															Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
															incididunt ut labore et dolore magna
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">12:45</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-success"></i>
														</div>
														<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
															AEOL Meeting With
														</div>
														<div class="m-list-pics m-list-pics--sm m--padding-left-20">
															<a href="#"><img src="assets/app/media/img/users/100_4.jpg" title=""></a>
															<a href="#"><img src="assets/app/media/img/users/100_13.jpg" title=""></a>
															<a href="#"><img src="assets/app/media/img/users/100_11.jpg" title=""></a>
															<a href="#"><img src="assets/app/media/img/users/100_14.jpg" title=""></a>
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">14:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-brand"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															Make Deposit <a href="#" class="m-link m-link--brand m--font-bolder">USD 700</a> To ESL.
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">16:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-warning"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
															incididunt ut labore et dolore magna elit enim at minim<br>
															veniam quis nostrud
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">17:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-info"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															Placed a new order in <a href="#" class="m-link m-link--brand m--font-bolder">SIGNATURE MOBILE</a> marketplace.
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">16:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-brand"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
															incididunt ut labore et dolore magna elit enim at minim<br>
															veniam quis nostrud
														</div>
													</div>
													<div class="m-timeline-2__item m--margin-top-30">
														<span class="m-timeline-2__item-time">17:00</span>
														<div class="m-timeline-2__item-cricle">
															<i class="fa fa-genderless m--font-danger"></i>
														</div>
														<div class="m-timeline-2__item-text m--padding-top-5">
															Received a new feedback on <a href="#" class="m-link m-link--brand m--font-bolder">FinancePro App</a> product.
														</div>
													</div>
												</div>
											</div>

											<!--End::Timeline 2 -->
										</div>
									</div>
								</div>

								<!--End::Portlet-->
							</div>
							<div class="col-xl-6 col-lg-12">

								<!--Begin::Portlet-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Recent Notifications
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
														Today
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content" role="tab">
														Month
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget2_tab1_content">

												<!--Begin::Timeline 3 -->
												<div class="m-timeline-3">
													<div class="m-timeline-3__items">
														<div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time">09:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Bob
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--warning">
															<span class="m-timeline-3__item-time">10:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Sean
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time">11:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit eiusmdd tempor
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--success">
															<span class="m-timeline-3__item-time">12:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--danger">
															<span class="m-timeline-3__item-time">14:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Derrick
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time">15:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit amit,consectetur
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Iman
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time">17:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem ipsum dolor sit consectetur eiusmdd tempor
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Aziko
																	</a>
																</span>
															</div>
														</div>
													</div>
												</div>

												<!--End::Timeline 3 -->
											</div>
											<div class="tab-pane" id="m_widget2_tab2_content">

												<!--Begin::Timeline 3 -->
												<div class="m-timeline-3">
													<div class="m-timeline-3__items">
														<div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time m--font-focus">09:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Bob
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--warning">
															<span class="m-timeline-3__item-time m--font-warning">10:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	There are many variations of passages of Lorem Ipsum available.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Sean
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time m--font-primary">11:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--success">
															<span class="m-timeline-3__item-time m--font-success">12:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By James
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--danger">
															<span class="m-timeline-3__item-time m--font-warning">14:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Latin words, combined with a handful of model sentence structures.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Derrick
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--info">
															<span class="m-timeline-3__item-time m--font-info">15:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Contrary to popular belief, Lorem Ipsum is not simply random text.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Iman
																	</a>
																</span>
															</div>
														</div>
														<div class="m-timeline-3__item m-timeline-3__item--brand">
															<span class="m-timeline-3__item-time m--font-danger">17:00</span>
															<div class="m-timeline-3__item-desc">
																<span class="m-timeline-3__item-text">
																	Lorem Ipsum is therefore always free from repetition, injected humour.
																</span><br>
																<span class="m-timeline-3__item-user-name">
																	<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																		By Aziko
																	</a>
																</span>
															</div>
														</div>
													</div>
												</div>

												<!--End::Timeline 3 -->
											</div>
										</div>
									</div>
								</div>

								<!--End::Portlet-->
							</div>
						</div> --}}

						<!--End::Section-->

						<!--Begin::Section-->
						{{-- <div class="row">
							<div class="col-xl-8">

								<!--begin:: Widgets/Application Sales-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Application Sales
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
														Last Month
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
														All Time
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget11_tab1_content">

												<!--begin::Widget 11-->
												<div class="m-widget11">
													<div class="table-responsive">

														<!--begin::Table-->
														<table class="table">

															<!--begin::Thead-->
															<thead>
																<tr>
																	<td class="m-widget11__label">#</td>
																	<td class="m-widget11__app">Application</td>
																	<td class="m-widget11__sales">Sales</td>
																	<td class="m-widget11__change">Change</td>
																	<td class="m-widget11__price">Avg Price</td>
																	<td class="m-widget11__total m--align-right">Total</td>
																</tr>
															</thead>

															<!--end::Thead-->

															<!--begin::Tbody-->
															<tbody>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																			<input type="checkbox"><span></span>
																		</label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Vertex 2.0</span>
																		<span class="m-widget11__sub">Vertex To By Again</span>
																	</td>
																	<td>19,200</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_1_1" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																		</div>
																	</td>
																	<td>$63</td>
																	<td class="m--align-right m--font-brand">$14,740</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Metronic</span>
																		<span class="m-widget11__sub">Powerful Admin Theme</span>
																	</td>
																	<td>24,310</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_1_2" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																		</div>
																	</td>
																	<td>$39</td>
																	<td class="m--align-right m--font-brand">$16,010</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Apex</span>
																		<span class="m-widget11__sub">The Best Selling App</span>
																	</td>
																	<td>9,076</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_1_3" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																		</div>
																	</td>
																	<td>$105</td>
																	<td class="m--align-right m--font-brand">$37,200</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Cascades</span>
																		<span class="m-widget11__sub">Design Tool</span>
																	</td>
																	<td>11,094</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_1_4" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																		</div>
																	</td>
																	<td>$16</td>
																	<td class="m--align-right m--font-brand">$8,520</td>
																</tr>
															</tbody>

															<!--end::Tbody-->
														</table>

														<!--end::Table-->
													</div>
													<div class="m-widget11__action m--align-right">
														<button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">Generate Report</button>
													</div>
												</div>

												<!--end::Widget 11-->
											</div>
											<div class="tab-pane" id="m_widget11_tab2_content">

												<!--begin::Widget 11-->
												<div class="m-widget11">
													<div class="table-responsive">

														<!--begin::Table-->
														<table class="table">

															<!--begin::Thead-->
															<thead>
																<tr>
																	<td class="m-widget11__label">#</td>
																	<td class="m-widget11__app">Application</td>
																	<td class="m-widget11__sales">Sales</td>
																	<td class="m-widget11__change">Change</td>
																	<td class="m-widget11__price">Avg Price</td>
																	<td class="m-widget11__total m--align-right">Total</td>
																</tr>
															</thead>

															<!--end::Thead-->

															<!--begin::Tbody-->
															<tbody>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																			<input type="checkbox"><span></span>
																		</label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Loop</span>
																		<span class="m-widget11__sub">CRM System</span>
																	</td>
																	<td>19,200</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_2_1" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																		</div>
																	</td>
																	<td>$63</td>
																	<td class="m--align-right m--font-brand">$34,740</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Selto</span>
																		<span class="m-widget11__sub">Powerful Website Builder</span>
																	</td>
																	<td>24,310</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_2_2" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																		</div>
																	</td>
																	<td>$39</td>
																	<td class="m--align-right m--font-brand">$46,010</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Jippo</span>
																		<span class="m-widget11__sub">The Best Selling App</span>
																	</td>
																	<td>9,076</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_2_3" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																		</div>
																	</td>
																	<td>$105</td>
																	<td class="m--align-right m--font-brand">$67,800</td>
																</tr>
																<tr>
																	<td>
																		<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand"><input type="checkbox"><span></span></label>
																	</td>
																	<td>
																		<span class="m-widget11__title">Verto</span>
																		<span class="m-widget11__sub">Web Development Tool</span>
																	</td>
																	<td>11,094</td>
																	<td>
																		<div class="m-widget11__chart" style="height:50px; width: 100px">
																			<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																			<canvas id="m_chart_sales_by_apps_2_4" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																		</div>
																	</td>
																	<td>$16</td>
																	<td class="m--align-right m--font-brand">$18,520</td>
																</tr>
															</tbody>

															<!--end::Tbody-->
														</table>

														<!--end::Table-->
													</div>
													<div class="m-widget11__action m--align-right">
														<button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">Generate Report</button>
													</div>
												</div>

												<!--end::Widget 11-->
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Application Sales-->
							</div>
							<div class="col-xl-4">

								<!--begin:: Widgets/Latest Updates-->
								<div class="m-portlet m-portlet--full-height m-portlet--fit ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Latest Updates
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
													<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
														Today
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
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
									<div class="m-portlet__body">
										<div class="m-widget4 m-widget4--chart-bottom" style="min-height: 350px">
											<div class="m-widget4__item">
												<div class="m-widget4__ext">
													<a href="#" class="m-widget4__icon m--font-brand">
														<i class="flaticon-interface-3"></i>
													</a>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														Make Metronic Great Again
													</span>
												</div>
												<div class="m-widget4__ext">
													<span class="m-widget4__number m--font-accent">+500</span>
												</div>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__ext">
													<a href="#" class="m-widget4__icon m--font-brand">
														<i class="flaticon-folder-4"></i>
													</a>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														Green Maker Team
													</span>
												</div>
												<div class="m-widget4__ext">
													<span class="m-widget4__stats m--font-info">
														<span class="m-widget4__number m--font-accent">-64</span>
													</span>
												</div>
											</div>
											<div class="m-widget4__item">
												<div class="m-widget4__ext">
													<a href="#" class="m-widget4__icon m--font-brand">
														<i class="flaticon-line-graph"></i>
													</a>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														Make Apex Great Again
													</span>
												</div>
												<div class="m-widget4__ext">
													<span class="m-widget4__stats m--font-info">
														<span class="m-widget4__number m--font-accent">+1080</span>
													</span>
												</div>
											</div>
											<div class="m-widget4__item m-widget4__item--last">
												<div class="m-widget4__ext">
													<a href="#" class="m-widget4__icon m--font-brand">
														<i class="flaticon-diagram"></i>
													</a>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														A Programming Language
													</span>
												</div>
												<div class="m-widget4__ext">
													<span class="m-widget4__stats m--font-info">
														<span class="m-widget4__number m--font-accent">+19</span>
													</span>
												</div>
											</div>
											<div class="m-widget4__chart m-portlet-fit--sides m--margin-top-20 m-portlet-fit--bottom1" style="height:120px;">
												<canvas id="m_chart_latest_updates"></canvas>
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Latest Updates-->
							</div>
						</div> --}}

						<!--End::Section-->

						<!--Begin::Section-->
						{{-- <div class="row">
							<div class="col-xl-8">
								<div class="m-portlet m-portlet--mobile ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Exclusive Datatable Plugin
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item">
													<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
														<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
															<i class="la la-ellipsis-h m--font-brand"></i>
														</a>
														<div class="m-dropdown__wrapper">
															<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
															<div class="m-dropdown__inner">
																<div class="m-dropdown__body">
																	<div class="m-dropdown__content">
																		<ul class="m-nav">
																			<li class="m-nav__section m-nav__section--first">
																				<span class="m-nav__section-text">Quick Actions</span>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-share"></i>
																					<span class="m-nav__link-text">Create Post</span>
																				</a>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-chat-1"></i>
																					<span class="m-nav__link-text">Send Messages</span>
																				</a>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																					<span class="m-nav__link-text">Upload File</span>
																				</a>
																			</li>
																			<li class="m-nav__section">
																				<span class="m-nav__section-text">Useful Links</span>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-info"></i>
																					<span class="m-nav__link-text">FAQ</span>
																				</a>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																					<span class="m-nav__link-text">Support</span>
																				</a>
																			</li>
																			<li class="m-nav__separator m-nav__separator--fit m--hide">
																			</li>
																			<li class="m-nav__item m--hide">
																				<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">

										<!--begin: Datatable -->
										<div class="m_datatable" id="m_datatable_latest_orders"></div>

										<!--end: Datatable -->
									</div>
								</div>
							</div>
							<div class="col-xl-4">

								<!--begin:: Widgets/Audit Log-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Audit Log
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
														Today
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
														Week
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
														Month
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget4_tab1_content">
												<div class="m-scrollable" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
													<div class="m-list-timeline m-list-timeline--skin-light">
														<div class="m-list-timeline__items">
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																<span class="m-list-timeline__text">12 new users registered</span>
																<span class="m-list-timeline__time">Just now</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																<span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
																<span class="m-list-timeline__time">14 mins</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																<span class="m-list-timeline__text">New invoice received</span>
																<span class="m-list-timeline__time">20 mins</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																<span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
																<span class="m-list-timeline__time">1 hr</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
																<span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
																<span class="m-list-timeline__time">2 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
																<span class="m-list-timeline__text">Production server down</span>
																<span class="m-list-timeline__time">3 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																<span class="m-list-timeline__text">Production server up</span>
																<span class="m-list-timeline__time">5 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																<span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
																<span class="m-list-timeline__time">7 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																<span class="m-list-timeline__text">12 new users registered</span>
																<span class="m-list-timeline__time">Just now</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																<span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
																<span class="m-list-timeline__time">14 mins</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																<span class="m-list-timeline__text">New invoice received</span>
																<span class="m-list-timeline__time">20 mins</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																<span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
																<span class="m-list-timeline__time">1 hr</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																<span class="m-list-timeline__text">New invoice received</span>
																<span class="m-list-timeline__time">20 mins</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																<span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
																<span class="m-list-timeline__time">1 hr</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
																<span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
																<span class="m-list-timeline__time">2 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
																<span class="m-list-timeline__text">Production server down</span>
																<span class="m-list-timeline__time">3 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																<span class="m-list-timeline__text">Production server up</span>
																<span class="m-list-timeline__time">5 hrs</span>
															</div>
															<div class="m-list-timeline__item">
																<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																<span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
																<span class="m-list-timeline__time">7 hrs</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="m_widget4_tab2_content">
											</div>
											<div class="tab-pane" id="m_widget4_tab3_content">
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Audit Log-->
							</div>
						</div> --}}

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
							<span class="m-footer__copyright">
								2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">About</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Privacy</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">T&C</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Purchase</span>
									</a>
								</li>
								<li class="m-nav__item m-nav__item--last">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Sidebar -->
		<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
			<div class="m-quick-sidebar__content m--hide">
				<span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
				<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">Messages</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">Settings</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">Logs</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
						<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
							<div class="m-messenger__messages m-scrollable">
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="{{ url('assets11/app/media/img//users/user3.jpg')}}" alt="" />
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Hi Bob. What time will be the meeting ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Hi Megan. It's at 2.30PM
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="{{ url('assets11/app/media/img//users/user3.jpg')}}" alt="" />
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Will the development team be joining ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Yes sure. I invited them as well
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__datetime">2:30PM</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="{{ url('assets11/app/media/img//users/user3.jpg')}}" alt="" />
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Noted. For the Coca-Cola Mobile App project as well ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Yes, sure.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Please also prepare the quotation for the Loop CRM project as well.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__datetime">3:15PM</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-no-pic m--bg-fill-danger">
											<span>M</span>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Noted. I will prepare it.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Thanks Megan. I will see you later.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="{{ url('assets11/app/media/img//users/user3.jpg')}}" alt="" />
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Sure. See you in the meeting soon.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-messenger__seperator"></div>
							<div class="m-messenger__form">
								<div class="m-messenger__form-controls">
									<input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
								</div>
								<div class="m-messenger__form-tools">
									<a href="" class="m-messenger__form-attachment">
										<i class="la la-paperclip"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
						<div class="m-list-settings m-scrollable">
							<div class="m-list-settings__group">
								<div class="m-list-settings__heading">General Settings</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Email Notifications</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Site Tracking</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">SMS Alerts</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Backup Storage</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Audit Logs</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
							</div>
							<div class="m-list-settings__group">
								<div class="m-list-settings__heading">System Settings</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">System Logs</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Error Reporting</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Applications Logs</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Backup Servers</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">Audit Logs</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
						<div class="m-list-timeline m-scrollable">
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									System Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">12 new users registered <span class="m-badge m-badge--warning m-badge--wide">important</span></a>
										<span class="m-list-timeline__time">Just now</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">System shutdown</a>
										<span class="m-list-timeline__time">11 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">New invoice received</a>
										<span class="m-list-timeline__time">20 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">Database overloaded 89% <span class="m-badge m-badge--success m-badge--wide">resolved</span></a>
										<span class="m-list-timeline__time">1 hr</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">System error</a>
										<span class="m-list-timeline__time">2 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">Production server down <span class="m-badge m-badge--danger m-badge--wide">pending</span></a>
										<span class="m-list-timeline__time">3 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">Production server up</a>
										<span class="m-list-timeline__time">5 hrs</span>
									</div>
								</div>
							</div>
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									Applications Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--info m-badge--wide">urgent</span></a>
										<span class="m-list-timeline__time">7 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">12 new users registered</a>
										<span class="m-list-timeline__time">Just now</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">System shutdown</a>
										<span class="m-list-timeline__time">11 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">New invoices received</a>
										<span class="m-list-timeline__time">20 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">Database overloaded 89%</a>
										<span class="m-list-timeline__time">1 hr</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">System error <span class="m-badge m-badge--info m-badge--wide">pending</span></a>
										<span class="m-list-timeline__time">2 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">Production server down</a>
										<span class="m-list-timeline__time">3 hrs</span>
									</div>
								</div>
							</div>
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									Server Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">Production server up</a>
										<span class="m-list-timeline__time">5 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">New order received</a>
										<span class="m-list-timeline__time">7 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">12 new users registered</a>
										<span class="m-list-timeline__time">Just now</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">System shutdown</a>
										<span class="m-list-timeline__time">11 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">New invoice received</a>
										<span class="m-list-timeline__time">20 mins</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">Database overloaded 89%</a>
										<span class="m-list-timeline__time">1 hr</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">System error</a>
										<span class="m-list-timeline__time">2 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">Production server down</a>
										<span class="m-list-timeline__time">3 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">Production server up</a>
										<span class="m-list-timeline__time">5 hrs</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">New order received</a>
										<span class="m-list-timeline__time">1117 hrs</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end::Quick Sidebar -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->

		<!-- begin::Quick Nav -->
		<ul class="m-nav-sticky" style="margin-top: 30px;">
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
				<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
			</li>
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
				<a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
			</li>
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
				<a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
			</li>
		</ul>

		<!-- begin::Quick Nav -->

		<!--begin::Global Theme Bundle -->
		<script src="{{ url('assets11/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ url('assets11/demo/demo11/base/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
        <script src="{{ url('assets11/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets11/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        @yield('require')
		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="{{ url('assets11/app/js/dashboard.js') }}" type="text/javascript"></script>
		<script src="{{ url('assets11/demo/demo11/custom/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
		<script src="{{ url('assets11/demo/demo11/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>

		<!--end::Page Scripts -->

		@include('script-global')
	</body>

	<!-- end::Body -->
</html>