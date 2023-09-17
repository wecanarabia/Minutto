<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">


                <a href="{{ route("front.extra-types.index") }}" class="btn btn-info float-end">
                    <i class="ti ti-folder-star text-white me-1 fs-5"></i> Extra Types
                  </a>
              <h4 class="fw-semibold mb-8">Extra Requests</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">Extra Requests</li>
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
                    <th>Extra Date</th>
                    <th>Employee</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Action</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $extra)
                <tr class="search-items" style="">
                    <td>{{ $extra->extra_date }}</td>



                   <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $extra->user->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$extra->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $extra->user->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>

                 <td>
                                        {{ $extra->from }}
                                       </td>
                                       <td>
                                        {{ $extra->to }}
                                       </td>
                                       <td>
                                        <span @class(['badge','bg-success'=>$extra->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$extra->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$extra->getTranslation('status','en')=='waiting',
                                            ])>
                                       {{ $extra->status }}</span>
                                       </td>

                                       <td>
                                       {{ $extra->extype->name }}
                                    </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.extras.show',$extra->id) }}" class="text-info edit">
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
