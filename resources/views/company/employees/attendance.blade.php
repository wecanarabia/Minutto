<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">
              <h4 class="fw-semibold mb-8">Attendance</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Attendance</li>
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
                <tr>
                    <th>Date</th>
                    <th>Attendance Time</th>
                    <th>Departure Time</th>
                    <th>Employee</th>
                    <th>Deduction</th>
                    <th>Status</th>
                    <th>Action</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $attendance)
                <tr class="search-items" style="">
                    <td>{{ $attendance->created_at->format('Y-m-d') }}</td>


                  <td>
                    {{ $attendance->time_attendance }}
                   </td>
                   <td>
                    {{ $attendance->time_departure }}
                   </td>
                   <td>
                    <div class="d-flex align-items-center">
                        @if ($attendance->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $attendance->user->name . ' ' . $attendance->user->last_name }}" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $attendance->user->image ) }}" alt="{{ $attendance->user->name . ' ' . $attendance->user->last_name }}" class="rounded-circle" width="35">
                      @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$attendance->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $attendance->user->name . ' ' . $attendance->user->last_name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>

                   <td>
                    {{ $attendance->discount_value }}
                   </td>
                   <td>
                    <span
                        @class(['badge','bg-success'=>$attendance->getTranslation('status','en')=='disciplined',
                        'bg-secondary'=>$attendance->getTranslation('status','en')=='late',
                        'bg-danger'=>$attendance->getTranslation('status','en')=='absence',
                        'bg-info'=>$attendance->getTranslation('status','en')=='vacation',
                        ])
                    >{{ $attendance->status }}</span>
                   </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.attendance.show',$attendance->id) }}" class="text-info edit">
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
