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
