<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-5 me-0 standard-bg">
    <div class="d-flex flex-column h-100">
        <a href="index-2.html" class="mb-0 brand-icon">
            <span class="logo-icon">
                <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path
                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                </svg>
            </span>
            <span class="logo-text">My-Task</span>
        </a>
        <!-- Menu: main ul -->

        <ul class="menu-list flex-grow-1 mt-3">
            <li class="collapsed">
                <a @class([
                    'ms-link',
                    'active' => Route::currentRouteName() == 'company.home',
                ]) data-bs-toggle="collapse" data-bs-target="#dashboard-Components"
                    href="#">
                    <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul @class([
                    'sub-menu',
                    'collapse',
                    'show' => Route::currentRouteName() == 'company.home',
                ]) id="dashboard-Components">
                    <li><a @class([
                        'ms-link',
                        'active' => Route::currentRouteName() == 'company.home',
                    ]) href="{{ route('company.home') }}"> <span>Hr
                                Dashboard</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app-Components" href="#">
                    <i class="icofont-contrast"></i> <span>Language</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="app-Components">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="ms-link" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span>{{ $properties['native'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @if (Auth::guard('company')->user()->company)
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#department-Components" href="#">
                        <i class="icofont-briefcase"></i><span>Departments</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.departments.index',
                    ]) id="department-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.departments.index',
                        ])
                                href="{{ route('company.departments.index') }}"><span>Departments</span></a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#branch-Components" href="#">
                        <i class="icofont-company"></i><span>Branches</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.branches.index',
                    ]) id="branch-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.branches.index',
                        ])
                                href="{{ route('company.branches.index') }}"><span>Branches</span></a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#shifts-Components" href="#">
                        <i class="icofont-clock-time"></i><span>Shifts</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.shifts.index',
                    ]) id="shifts-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.shifts.index',
                        ])
                                href="{{ route('company.shifts.index') }}"><span>Shifts</span></a></li>
                    </ul>
                </li>


                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#leavs-types-Components" href="#">
                        <i class="icofont-architecture-alt"></i><span>Leave Types</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.shifts.index',
                    ]) id="leavs-types-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.leave-types.index',
                        ])
                                href="{{ route('company.leave-types.index') }}"><span>Leave Types</span></a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#emp-Components" href="#"><i
                            class="icofont-users-alt-5"></i> <span>Employees</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.employees.index'||Route::currentRouteName() == 'company.attendance.index',
                    ])  id="emp-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.employees.index',
                        ]) href="{{ route('company.employees.index') }}"> <span>Members</span></a>
                        </li>
                        <li><a class="ms-link" href="holidays.html"> <span>Holidays</span></a></li>
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.attendance.index',
                        ])  href="{{ route('company.attendance.index') }}"> <span>Attendance Employees</span></a>
                        </li>
                        <li><a class="ms-link" href="attendance.html"> <span>Attendance</span></a></li>
                        <li><a class="ms-link" href="leave-request.html"> <span>Leave Request</span></a></li>
                        <li><a class="ms-link" href="department.html"> <span>Department</span></a></li>
                        <li><a class="ms-link" href="loan.html"> <span>Loan</span></a></li>
                    </ul>
                </li>
            @endif
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#company-Components" href="#">
                    <i class="icofont-settings"></i><span>Company Settings</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                @if (Auth::guard('company')->user()->company)
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.company-settings.show',
                    ]) id="company-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.company-settings.show',
                        ])
                                href="{{ route('company.company-settings.show') }}"><span>Company Details</span></a>
                        </li>
                    </ul>
                @else
                    <ul @class([
                        'sub-menu',
                        'collapse',
                        'show' => Route::currentRouteName() == 'company.company-settings.create',
                    ])" id="company-Components">
                        <li><a @class([
                            'ms-link',
                            'active' => Route::currentRouteName() == 'company.company-settings.create',
                        ])"
                                href="{{ route('company.company-settings.create') }}"><span>Set Company</span></a></li>
                    </ul>
                @endif
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i
                        class="icofont-ticket"></i> <span>Tickets</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="tikit-Components">
                    <li><a class="ms-link" href="tickets.html"> <span>Tickets View</span></a></li>
                    <li><a class="ms-link" href="ticket-detail.html"> <span>Ticket Detail</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#client-Components" href="#"><i
                        class="icofont-user-male"></i> <span>Our Clients</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="client-Components">
                    <li><a class="ms-link" href="ourclients.html"> <span>Clients</span></a></li>
                    <li><a class="ms-link" href="profile.html"> <span>Client Profile</span></a></li>
                </ul>
            </li>


            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#"><i
                        class="icofont-ui-calculator"></i> <span>Accounts</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-Componentsone">
                    <li><a class="ms-link" href="invoices.html"><span>Invoices</span> </a></li>
                    <li><a class="ms-link" href="payments.html"><span>Payments</span> </a></li>
                    <li><a class="ms-link" href="expenses.html"><span>Expenses</span> </a></li>
                    <li><a class="ms-link" href="create-invoice.html"><span>Create Invoice</span> </a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#payroll-Components" href="#"><i
                        class="icofont-users-alt-5"></i> <span>Payroll</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="payroll-Components">
                    <li><a class="ms-link" href="salaryslip.html"><span>Employee Salary</span> </a></li>

                </ul>
            </li>



            <li><a class="m-link" href="ui-elements/ui-alerts.html"><i class="icofont-paint"></i> <span>UI
                        Components</span></a></li>
        </ul>

        <!-- Theme: Switch Theme -->
        <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center justify-content-center">
                <div class="form-check form-switch theme-switch">
                    <input class="form-check-input" type="checkbox" id="theme-switch">
                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                </div>
            </li>

        </ul>

        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
