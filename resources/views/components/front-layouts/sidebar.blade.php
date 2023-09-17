     <!-- Sidebar Start -->

     <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="index.html" class="text-nowrap logo-img">
              <img src="{{ asset('dist/images/logos/logo.svg') }}" class="dark-logo" width="180" alt="" />
              <img src="{{ asset('dist/images/logos/light-logo.svg') }}" class="light-logo"  width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
              <!-- ============================= -->
              <!-- Home -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">القائمة الرئيسية</span>
              </li>
              <!-- =================== -->
              <!-- Dashboard -->
              <!-- =================== -->
              <li class="sidebar-item">
                <a class="sidebar-link" href="index.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                  <span class="hide-menu">الرئيسية</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="index2.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-fingerprint"></i>
                  </span>
                  <span class="hide-menu">كشف الحضور والإنصراف</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="index3.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-files"></i>
                  </span>
                  <span class="hide-menu">الطلبات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="index4.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-bell-plus"></i>
                  </span>
                  <span class="hide-menu">الإشعارات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="index5.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-moon"></i>
                  </span>
                  <span class="hide-menu">الوضع اللليلي</span>
                </a>
              </li>
              <!-- ============================= -->
              <!-- Apps -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">الموارد البشرية</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('front.employees.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">بيانات العاملين</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('front.attendance.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-fingerprint"></i>
                  </span>
                  <span class="hide-menu">كشف الحضور والإنصراف</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.vacations.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-beach"></i>
                  </span>
                  <span class="hide-menu">طلبات الإجازة</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.leaves.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-door-exit"></i>
                  </span>
                  <span class="hide-menu">طلبات المغادرة</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.extras.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-24-hours"></i>
                  </span>
                  <span class="hide-menu">العمل الإضافي</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.rewards.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-certificate"></i>
                  </span>
                  <span class="hide-menu">الحوافز والمكافئات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.official-vacations.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-calendar-event"></i>
                  </span>
                  <span class="hide-menu">الإجازات الرسمية</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.alerts.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-alert"></i>
                  </span>
                  <span class="hide-menu">الإنذارات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-home-shield"></i>
                  </span>
                  <span class="hide-menu">الإنظمة والتعليمات</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="blog-posts.html" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">النظام الداخلي</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="blog-detail.html" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">قوانين الإجازات والمغادرات</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- ============================= -->
              <!-- PAGES -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">قسم المحاسبة</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route("front.salaries.index") }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-report-money"></i>
                  </span>
                  <span class="hide-menu">كشوفات الرواتب</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('front.advances.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-wallet"></i>
                  </span>
                  <span class="hide-menu">طلبات السلف</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="page-account-settings.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-replace"></i>
                  </span>
                  <span class="hide-menu">طلبات البدلات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/landingpage/index.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-square-rounded"></i>
                  </span>
                  <span class="hide-menu">الخصومات والعقوبات</span>
                </a>
              </li>
              <!-- ============================= -->
              <!-- UI -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">قسم الإدارة</span>
              </li>
              <!-- =================== -->
              <!-- UI Elements -->
              <!-- =================== -->
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-home-cog"></i>
                  </span>
                  <span class="hide-menu">اعدادات الشركة</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{ route('front.branches.index') }}" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">ادارة الفروع</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('front.shifts.index') }}" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">ادارة الورديات</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('front.departments.index') }}" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">ادارة الأقسام</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route("front.employee-vacations.index") }}" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">تنظيم الأجازات</span>
                    </a>
                  </li>

                  <li class="sidebar-item">
                    <a href="{{ route("front.logs.index") }}" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">ادارة السجلات</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('front.admins.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-accessible"></i>
                  </span>
                  <span class="hide-menu">ادارة الصلاحيات والموظفين</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="page-faq.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">التقارير</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="page-faq.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-device-audio-tape"></i>
                  </span>
                  <span class="hide-menu">حركات الإدارة</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="page-faq.html" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-invoice"></i>
                  </span>
                  <span class="hide-menu">الاشتراك والفواتير</span>
                </a>
              </li>


              <!-- ============================= -->
              <!-- Forms -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">قسم المساعدة</span>
              </li>
              <!-- =================== -->
              <!-- Form Input -->
              <!-- =================== -->
              <li class="sidebar-item">
                <a class="sidebar-link" href="form-basic.html" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-help-hexagon"></i>
                  </span>
                  <span class="hide-menu">الأسئلة الشائعة</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="form-vertical.html" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-radio"></i>
                  </span>
                  <span class="hide-menu">الأخبار والتحديثات</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="form-horizontal.html" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-message-chatbot"></i>
                  </span>
                  <span class="hide-menu">الدعم الفني</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="form-actions.html" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-home-question"></i>
                  </span>
                  <span class="hide-menu">مكتبة الشروحات</span>
                </a>
              </li>
            </div>
        </aside>
