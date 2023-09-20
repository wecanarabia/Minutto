<x-front-layouts.app>
    <div class="row">

        <div class="col-lg-10">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Salaries</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted"
                                            href="{{ route('front.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a class="text-muted"
                                            href="{{ route('front.salaries.index') }}">Salaries</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body">
            <x-front-layouts.messages/>
          <div class="table-responsive">
            <table class="table border text-nowrap customize-table mb-0 align-middle">

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
                @foreach ($salaries??null as $salary)
                <tr class="search-items">

                       <td>
                        {{ $salary->year }}
                       </td>

                       <td>
                        {{ $salary->month }}
                       </td>

                   <td>
                    <div class="d-flex align-items-center">
                        @if ($salary->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $salary->user->image ) }}" alt="avatar" class="rounded-circle" width="35">
                        @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$salary->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $salary->user->name }}</h6></a>
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
    </div>
</x-front-layouts.app>
