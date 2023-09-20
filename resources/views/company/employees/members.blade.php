<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">


              <h4 class="fw-semibold mb-8">Employees</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Employees</li>
                </ol>
              </nav>
            </div>

          </div>
        </div>
      </div>
      <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->

        <!-- ---------------------
                        end Contact
                    ---------------- -->

        <div class="card card-body">
            <x-front-layouts.messages/>
          <div class="table-responsive">
            <table id="scroll_hor"
            class="table border table-striped table-bordered display nowrap"
            style="width: 100%">
            <thead class="header-item">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Branch</th>
                <th>Department</th>
                <th>Shift</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($employees as $employee)
                <tr class="search-items" style="">
                  <td>
                    <div class="d-flex align-items-center">
                        @if (!$employee->image)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $employee->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$employee->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $employee->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $employee->email }}
                   </td>
                   <td>
                    {{ $employee->phone }}
                   </td>
                   <td>
                    {{ $employee?->branch?->name }}
                   </td>
                   <td>
                    {{ $employee?->shift?->name }}
                   </td>
                   <td>
                    {{ $employee?->shift?->name }}
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
