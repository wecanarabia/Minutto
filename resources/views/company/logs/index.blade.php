<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">
              <h4 class="fw-semibold mb-8">Logs</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Logs</li>
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
                    <th>Created At</th>
                    <th>Employee</th>
                    <th>Admin</th>
                    <th>Title</th>
                    <th>Log</th>
                    <th>Action</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $log)
                <tr class="search-items" style="">
                    <td>{{ $log->created_at }}</td>


                    <td>
                    <div class="d-flex align-items-center">
                        @if ($log->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt=">{{ $log->user->name . ' ' . $log->user->last_name }}" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $log->user->image ) }}" alt="{{ $log->user->name . ' ' . $log->user->last_name }}" class="rounded-circle" width="35">
                      @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$log->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $log->user->name . ' ' . $log->user->last_name }}</h6></a>
                        </div>
                      </div>
                    </div>
                    </td>

                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $log->admin->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.admins.show',$log->admin->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $log->admin->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>
                    <td>
                        {{ $log->on }}
                       </td>

                       <td>
                        {{ $log->log }}
                       </td>
                       <td>
                    <div class="action-btn">
                      <a href="{{ route('front.logs.show',$log->id) }}" class="text-info edit">
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
