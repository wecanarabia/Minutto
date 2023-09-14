<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">


                <a href="{{ route("front.vacation-types.index") }}" class="btn btn-info float-end">
                    <i class="ti ti-calendar-due text-white me-1 fs-5"></i> Vacation Types
                  </a>
              <h4 class="fw-semibold mb-8">Vacation Requests</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Vacation Requests</li>
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
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Employee</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Action</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $vacation)
                <tr class="search-items" style="">
                    <td>
                        {{ $vacation->from }}
                       </td>
                       <td>
                        {{ $vacation->to }}
                       </td>


                   <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $vacation->user->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$vacation->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $vacation->user->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>


                                       <td>
                                        <span @class(['badge','bg-success'=>$vacation->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$vacation->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$vacation->getTranslation('status','en')=='waiting',
                                            ])>
                                       {{ $vacation->status }}</span>
                                       </td>

                                       <td>
                                       {{ $vacation->vtype->name }}
                                    </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.vacations.show',$vacation->id) }}" class="text-info edit">
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
