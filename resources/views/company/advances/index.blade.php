<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">
              <h4 class="fw-semibold mb-8">Advance Requests</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Advance Requests</li>
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
                    <th>Request Date</th>
                    <th>Employee</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
              </tr>
             </thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $advance)
                <tr class="search-items" style="">
                    <td>{{ $advance->req_date }}</td>
                   <td>
                    <div class="d-flex align-items-center">
                        @if ($advance->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="user4" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $advance->user->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$advance->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $advance->user->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>

                   <td>
                    {{ $advance->value }}
                   </td>
                   <td>
                    <span
                        @class(['badge','bg-success'=>$advance->getTranslation('status','en')=='approve',
                        'bg-danger'=>$advance->getTranslation('status','en')=='rejected',
                        'bg-info'=>$advance->getTranslation('status','en')=='waiting'])
                    >{{ $advance->status }}</span>
                   </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.advances.show',$advance->id) }}" class="text-info edit">
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
