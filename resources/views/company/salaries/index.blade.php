<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">

                @if ($data['salaries']->count()==0)

                <a href="{{ route('front.salaries.generate') }}" class="btn btn-info float-end mx-2">
                    <i class="ti ti-currency-real text-white me-1 fs-5"></i> Generate Salaries Of this Month
                  </a>
                  @else
                  <a href="{{ route('front.salaries.update') }}" class="btn btn-info float-end mx-2">
                    <i class="ti ti-currency-dollar-singapore text-white me-1 fs-5"></i> Update Salaries Of this Month
                  </a>

                  @endif
                  @if (count($employeesNoSalary)>0&&$data['salaries']->count()>=0)

                  <a href="{{ route("front.salaries.create") }}" class="btn btn-info float-end mx-2">
                    <i class="ti ti-currency-dollar-canadian text-white me-1 fs-5"></i> Add Salary for new Employee
                  </a>
                  @endif

              <h4 class="fw-semibold mb-8">Salaries</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Salaries</li>
                </ol>
              </nav>
            </div>

          </div>
        </div>
      </div>
      <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
                <form class="position-relative" method="POST" action="{{ route("front.salaries.filter") }}">
                    @csrf
                    <div class="row">

                    <div class="col-2">

                    <select id="year-filter" name="year" class="form-select">
                        <option selected disabled>Select Year</option>
                        @foreach ($data['years']  as $year)
                            <option value="{{ $year }}"  @selected($year==\Carbon\Carbon::now()->year)>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">


                    <select id="month-filter" name="month" class="form-select">
                        <option selected disabled>Select Month</option>
                        @foreach (range(1,12) as $month)
                            <option value="{{ $month }}" @selected($month==\Carbon\Carbon::now()->month)>{{ $month }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-2">

                    <input type="submit" class="btn btn-info" value="filter">
                </div>
            </div>

                </form>

          </div>
        <!-- ---------------------
                        end Contact
                    ---------------- -->

        <div class="card card-body">
            <x-front-layouts.messages/>
            <div class="owl-carousel counter-carousel owl-theme">
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-primary shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-primary mb-1"> Total Actual Salaries </p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $data['salaries']->sum('actual_salary') }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Total discounts and alerts</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $data['workhours'] + $data['leaves'] + $data['alerts_in_days'] + $data['alerts'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Total Advances</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['advances'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-danger shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-danger mb-1">Total Allowances</p>
                        <h5 class="fw-semibold text-danger mb-0">{{ $data['rewards'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-success mb-1">Total Extras</p>
                        <h5 class="fw-semibold text-success mb-0">{{ $data['extras'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-info mb-1">Total Bouns</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['bouns'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65px" height="65px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M229.8 191.8h556c12.8 0 23.2 10.4 23.2 23.2v590.8c0 12.8-10.4 23.2-23.2 23.2h-556c-12.8 0-23.2-10.4-23.2-23.2V215c0-12.8 10.4-23.2 23.2-23.2z" fill="#FFFFFF"/><path d="M784.6 828.9H231c-13.4 0-24.4-10.9-24.4-24.4V216.1c0-13.4 10.9-24.4 24.4-24.4h553.6c13.4 0 24.4 10.9 24.4 24.4v588.4c-0.1 13.5-11 24.4-24.4 24.4z m-507.3-46.4h461c13.4 0 24.4-10.9 24.4-24.4V262.5c0-13.4-10.9-24.4-24.4-24.4h-461c-13.4 0-24.4 10.9-24.4 24.4v495.7c0 13.4 10.9 24.3 24.4 24.3z" fill="#333333"/><path d="M369.2 296h287.9c25.9 0 46.8 21 46.8 46.8V459c0 25.9-21 46.8-46.8 46.8H369.2c-25.9 0-46.8-21-46.8-46.8V342.9c0-25.9 21-46.9 46.8-46.9z" fill="#F4CE26"/><path d="M657.7 505.9H368.8c-25.6 0-46.3-20.8-46.3-46.3V342.4c0-25.5 20.8-46.3 46.3-46.3h288.9c25.6 0 46.3 20.8 46.3 46.3v117.2c0 25.5-20.8 46.3-46.3 46.3zM368.8 342.4v117.2h288.9V342.4H368.8zM345.6 666.7h335.2c12.8 0 23.2 10.4 23.2 23.2 0 12.8-10.4 23.2-23.2 23.2H345.6c-12.8 0-23.2-10.4-23.2-23.2 0-12.8 10.4-23.2 23.2-23.2zM438.3 562.5h144.5c12.8 0 23.2 10.4 23.2 23.2 0 12.8-10.4 23.2-23.2 23.2H438.3c-12.8 0-23.2-10.4-23.2-23.2 0-12.9 10.4-23.2 23.2-23.2z" fill="#333333"/></svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Total Insurance</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['insurance_value'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65px" height="65px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M270.6 159h485.7c14.5 0 26.3 11.8 26.3 26.3v669.5c0 14.5-11.8 26.3-26.3 26.3H270.6c-14.5 0-26.3-11.8-26.3-26.3V185.3c0.1-14.5 11.8-26.3 26.3-26.3z" fill="#FFFFFF"/><path d="M730.1 881H296.9c-29 0-52.5-23.5-52.5-52.5v-617c0-29 23.6-52.5 52.5-52.5h433.2c29 0 52.5 23.5 52.5 52.5v617c0 29-23.6 52.5-52.5 52.5zM296.9 211.5v617h433.2v-617H296.9z" fill="#2F2F33"/><path d="M435.4 264h156.2c54.7 0 99.1 44.4 99.1 99.1v261.2c0 54.7-44.4 99.1-99.1 99.1H435.4c-54.7 0-99.1-44.4-99.1-99.1V363.1c0-54.7 44.3-99.1 99.1-99.1z" fill="#8CAAFF"/><path d="M638.2 723.5H388.8c-29 0-52.5-23.5-52.5-52.5V316.6c0-29 23.6-52.5 52.5-52.5h249.4c29 0 52.5 23.5 52.5 52.5V671c0 28.9-23.6 52.5-52.5 52.5z m-249.4-407V671h249.4V316.6H388.8zM480.7 749.7h65.6c14.5 0 26.3 11.8 26.3 26.3s-11.8 26.3-26.3 26.3h-65.6c-14.5 0-26.3-11.8-26.3-26.3s11.8-26.3 26.3-26.3z" fill="#2F2F33"/></svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Total Income Tax</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['income_tax'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65px" height="65px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M448.4 687.5l-165 84.9c-13.7 7-30.5 1.7-37.6-12-2.8-5.4-3.7-11.6-2.7-17.6l31.2-178.1c1.6-9.2-1.5-18.6-8.2-25L134.3 413.9c-11.1-10.6-11.6-28.3-0.9-39.4a28.3 28.3 0 0 1 16.3-8.4L332.9 340c9-1.3 16.9-6.9 21-15.1l82.4-163.4c6.9-13.7 23.7-19.2 37.5-12.2 5.3 2.7 9.7 7 12.3 12.3L568.5 325c4.1 8.1 11.9 13.8 21 15.1l183.2 26.1c15.3 2.2 25.9 16.3 23.7 31.5-0.9 6.2-3.8 11.9-8.4 16.3L656.3 539.6c-6.7 6.4-9.8 15.8-8.2 25l31.2 178.1c2.7 15.2-7.5 29.6-22.7 32.3-6 1.1-12.2 0.1-17.6-2.7l-165-84.9c-8-4-17.5-4-25.6 0.1z" fill="#FFDB5B"/><path d="M270.7 803.4c-20.3 0-39.8-11.1-49.7-30.3-5.5-10.7-7.4-23.2-5.3-35.2l31.2-178.1-131.8-125.7c-10.8-10.3-16.9-24.2-17.3-39.1-0.3-14.9 5.1-29 15.4-39.8 8.6-9 20.1-15 32.5-16.7L329 312.4 411.4 149c13.8-27.5 47.5-38.5 74.9-24.7 10.8 5.4 19.3 14 24.7 24.7l82.4 163.4 183.3 26.1c30.5 4.3 51.7 32.6 47.4 63.1-1.7 12.3-7.7 23.9-16.7 32.5L675.5 559.8 706.7 738c5.3 30.3-15 59.3-45.3 64.6-11.9 2.1-24.4 0.2-35.2-5.3l-165-84.9-165 84.9c-8.2 4.1-16.9 6.1-25.5 6.1z m190.5-146.9c8.8 0 17.5 2.1 25.5 6.2l165 84.9-31.2-178.1c-3.2-18.4 2.9-37.1 16.4-50l131.8-125.7-183.2-26.1c-18.1-2.6-33.8-13.8-42-30.1l-82.3-163.4-82.4 163.4c-8.2 16.3-23.9 27.5-42 30.1l-183.2 26 131.8 125.7c13.5 12.9 19.7 31.6 16.5 50l-31.2 178.1 165-84.9c8-4 16.7-6.1 25.5-6.1z" fill="#333333"/><path d="M714.2 420.2C823.4 420.2 912 508.8 912 618c0 109.2-88.5 197.8-197.8 197.8-109.2 0-197.8-88.5-197.8-197.8 0-109.2 88.6-197.8 197.8-197.8z" fill="#FFFFFF"/><path d="M714.2 815.8c-109.1 0-197.8-88.7-197.8-197.8s88.7-197.8 197.8-197.8S912 509 912 618s-88.7 197.8-197.8 197.8z m0-339.8c-78.3 0-142 63.7-142 142s63.7 142 142 142 142-63.7 142-142-63.7-142-142-142z" fill="#333333"/><path d="M687.2 591.1v-36c0-14.9 12.1-27 27-27s27 12.1 27 27v36h36c14.9 0 27 12.1 27 27s-12.1 27-27 27h-36v36c0 14.9-12.1 27-27 27s-27-12.1-27-27v-36h-36c-14.9 0-27-12.1-27-27s12.1-27 27-27h36z" fill="#333333"/></svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Total Retirement Benefits</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['retirement_benefits'] }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
               <div class="item">
                  <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                      <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65px" height="65px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M566 268.4v66.3H353.9v-66.3h-66.3v-79.5h357.9v79.5H566z" fill="#FFFFFF"/><path d="M558.5 319.2l98.7 86.4c72.6 50.6 115.8 133.5 115.8 222 0 88-63.7 163-150.5 177.4-55 9.1-110.1 13.6-165.1 13.6s-110.1-4.5-165.1-13.6c-86.8-14.3-150.5-89.4-150.5-177.4 0-88.5 43.3-171.3 115.8-221.9l113.7-86.4h187.2z" fill="#FFFFFF"/><path d="M457.4 845.1c-56.2 0-113.2-4.7-169.4-14C188 814.6 115.3 729 115.3 627.6c0-97.1 47.5-188.2 127.2-243.7l119.9-91.2h206l105.1 92c78.9 55.6 126 146.2 126 242.8 0 101.4-72.6 187-172.7 203.5-56.1 9.4-113.1 14.1-169.4 14.1z m-77.2-499.4l-106.5 81c-66.3 46.2-105.4 121.1-105.4 200.8 0 75.3 54 138.9 128.3 151.2 106.7 17.6 214.9 17.6 321.6 0 74.3-12.3 128.3-75.9 128.3-151.2 0-79.7-39.1-154.6-104.5-200.2l-2.3-1.8-91.2-79.8H380.2z" fill="#333333"/><path d="M354 305l-66.7-57.3c-13.8-8.9-21-22.7-20.7-36.7m395.1 0.1c0 14.7-8.3 28.4-22.1 36.5L561.9 308" fill="#FFFFFF"/><path d="M561.9 334.5c-7.9 0-15.7-3.5-21-10.3-9-11.6-6.9-28.2 4.7-37.2l80.5-62.2c5.7-3.3 9-8.5 9-13.7 0-14.6 11.9-26.5 26.5-26.5s26.5 11.9 26.5 26.5c0 23.6-12.5 45.3-33.6 58.4l-76.6 59.4c-4.6 3.8-10.3 5.6-16 5.6z m-208-3c-6.1 0-12.3-2.1-17.3-6.4l-65.4-56.3c-20-13.6-31.6-35.3-31.2-58.4 0.3-14.6 12.8-26.4 27-26 14.6 0.3 26.3 12.4 26 27-0.1 5.3 3 10.4 8.5 13.9l2.9 2.2 66.7 57.3c11.1 9.5 12.4 26.3 2.8 37.4-5.1 6.2-12.5 9.3-20 9.3z" fill="#333333"/><path d="M365.4 229.3c-14.6 0-26.5-11.9-26.5-26.5 0-6.6-9.8-13.9-22.9-13.9s-22.9 7.4-22.9 13.9c0 14.6-11.9 26.5-26.5 26.5s-26.5-11.9-26.5-26.5c0-36.9 34-67 75.9-67s75.9 30 75.9 67c0 14.7-11.9 26.5-26.5 26.5zM562.9 229.3c-14.6 0-26.5-11.9-26.5-26.5 0-6.6-9.8-13.9-22.9-13.9-13.1 0-22.9 7.4-22.9 13.9 0 14.6-11.9 26.5-26.5 26.5s-26.5-11.9-26.5-26.5c0-36.9 34.1-67 75.9-67s75.9 30 75.9 67c0.1 14.7-11.8 26.5-26.5 26.5z" fill="#333333"/><path d="M661.7 229.3c-14.6 0-26.5-11.9-26.5-26.5 0-6.6-9.8-13.9-22.9-13.9s-22.9 7.4-22.9 13.9c0 14.6-11.9 26.5-26.5 26.5s-26.5-11.8-26.5-26.5c0-36.9 34-67 75.9-67s75.9 30 75.9 67c0 14.7-11.8 26.5-26.5 26.5zM464.2 229.3c-14.6 0-26.5-11.9-26.5-26.5 0-6.6-9.8-13.9-22.9-13.9s-22.9 7.4-22.9 13.9c0 14.6-11.9 26.5-26.5 26.5s-26.5-11.9-26.5-26.5c0-36.9 34-67 75.9-67s75.9 30 75.9 67c0 14.7-11.9 26.5-26.5 26.5z" fill="#333333"/><path d="M679.1 621.5m-205.1 0a205.1 205.1 0 1 0 410.2 0 205.1 205.1 0 1 0-410.2 0Z" fill="#FFDB5B"/><path d="M679.1 853.1c-127.7 0-231.6-103.9-231.6-231.6 0-127.7 103.9-231.6 231.6-231.6s231.6 103.9 231.6 231.6c0 127.7-103.9 231.6-231.6 231.6z m0-410.2C580.6 442.9 500.4 523 500.4 621.5S580.5 800.1 679 800.1 857.7 720 857.7 621.5s-80.2-178.6-178.6-178.6z" fill="#333333"/><path d="M720.47 621.453l-41.436 41.436-41.437-41.436 41.436-41.437z" fill="#FFFFFF"/><path d="M679.079 737.919l-116.46-116.46 116.46-116.461 116.46 116.46-116.46 116.46z m-41.508-116.46l41.437 41.436 41.436-41.437-41.436-41.436-41.437 41.436z" fill="#333333"/><path d="M591.6 302.3l76-20.4c14.1-3.8 28.7 4.6 32.5 18.7 3.8 14.1-4.6 28.7-18.7 32.5l-76 20.4c-14.1 3.8-28.7-4.6-32.5-18.7-3.8-14.2 4.6-28.7 18.7-32.5z" fill="#333333"/></svg>
                        <p class="fw-semibold fs-3 text-info mb-1">Total net slaries</p>
                        <h5 class="fw-semibold text-info mb-0">{{ $data['salaries']->sum('net_salary') }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Employee</th>
                    <th>Actual Salary</th>
                    <th>Net Salary</th>
                    <th>Action</th>
              </tr>
            </thead>
              <tbody>
                <!-- start row -->
                @foreach ($data['salaries']??null as $salary)
                <tr class="search-items" style="">
                    <td>
                        {{ $salary->month }}
                       </td>
                       <td>
                        {{ $salary->year }}
                       </td>



                   <td>
                    <div class="d-flex align-items-center">
                        @if ($salary->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $salary->user->name . ' ' . $salary->user->last_name }}" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $salary->user->image ) }}" alt="{{ $salary->user->name . ' ' . $salary->user->last_name }}" class="rounded-circle" width="35">
                        @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$salary->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $salary->user->name . ' ' . $salary->user->last_name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    {{ $salary->actual_salary }}
                   </td>
                    <td>
                    {{ $salary->net_salary }}
                   </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.salaries.show',$salary->id) }}" class="text-info edit">
                        <i class="ti ti-eye fs-5"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
                <!-- end row -->
              </tbody>
            </table>
          </div>
        </div>
      </div>


</x-front-layouts.app>
