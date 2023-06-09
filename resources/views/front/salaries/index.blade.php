<x-layouts.header title="Salaries"/>

<x-layouts.app>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Salaries</h3>


                        @if (empty($data['salaries']))
                        <div class="col-auto d-flex w-sm-100">
                            <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.salaries.generate') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Generate Salaries this Month</a>
                        </div>
                        @else
                        <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.salaries.update') }}">Update Salaries</a>
                        @if (count($employeesNoSalary)>0)
                        <a class="btn btn-dark btn-set-task w-sm-100" href="{{ route('company.salaries.create') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Salary</a>
                        @endif
                        @endif

                        <div class="col-auto d-flex w-sm-100">
                            <select id="month-filter" class="btn btn-dark">
                                <option selected disabled>Select Month</option>
                                @foreach (range(1,12) as $month)
                                    <option value="{{ $month }}" @selected($month==\Carbon\Carbon::now()->month)>{{ $month }}</option>
                                @endforeach
                            </select>
                            <select id="year-filter" class="btn btn-dark mx-2">
                                <option selected disabled>Select Year</option>
                                @foreach ($data['years']  as $year)
                                    <option value="{{ $year }}"  @selected($year==\Carbon\Carbon::now()->year)>{{ $year }}</option>
                                @endforeach
                            </select>

                        </div>



                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">

            <div class="col-md-12">
                <div class="card  mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Employees Availability</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 row-deck">
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                        <i class="icofont-money-bag fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Actual Salaries</h6>
                                        <span class="text-muted" id="actual">{{ $data['salaries']->sum('actual_salary') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                            <i class="icofont-dollar-flase fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total discounts and alerts</h6>
                                        <span class="text-muted" id="discount">{{ $data['workhours'] + $data['leaves'] + $data['alerts_in_days'] + $data['alerts'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                            <i class="icofont-dollar-minus fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Advances</h6>
                                        <span class="text-muted" id="advance">{{ $data['advances'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                            <i class="icofont-coins fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Incentives</h6>
                                        <span class="text-muted" id="reward">{{ $data['rewards'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                            <i class="icofont-meeting-add fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-14">Total Extras</h6>
                                        <span class="text-muted" id="extra">{{ $data['extras'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body ">
                                        <i class="icofont-money fs-3"></i>
                                        <h6 class="mt-3 mb-0 fw-bold small-10">Total net slaries</h6>
                                            <span class="text-muted" id="net">{{ $data['salaries']->sum('net_salary') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="row clearfix g-3">
              <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-hover data-table align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Employee</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Actual Salary</th>
                                        <th>Net Salary</th>
                                        <th>Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['salaries']??null as $salary)

                                    <tr>
                                        <td>
                                            {{ $salary->id }}
                                        </td>
                                       <td>
                                           <img class="avatar rounded-circle" src="{{ asset( $salary->user->image ) }}" alt="">
                                           <a href="{{ route('company.employees.show',$salary->user->id) }}" class="fw-bold text-secondary">
                                           <span class="fw-bold ms-1">{{ $salary->user->name }}</span></a>
                                       </td>
                                       <td>
                                        {{ $salary->month }}
                                       </td>
                                       <td>
                                        {{ $salary->year }}
                                       </td>
                                        <td>
                                        {{ $salary->actual_salary }}
                                       </td>
                                        <td>
                                        {{ $salary->net_salary }}
                                       </td>

                                       <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a class="btn btn-outline-secondary" href="{{ route('company.salaries.show',$salary->id) }}"><i class="icofont-location-arrow"></i></a>
                                        </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
              </div>
            </div><!-- Row End -->
        </div>
    </div>


</x-layouts.app>
