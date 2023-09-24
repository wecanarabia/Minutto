<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-12">


                <a href="{{ route("front.leave-types.index") }}" class="btn btn-info float-end">
                    <i class="ti ti-device-ipad-horizontal-star text-white me-1 fs-5"></i>@lang('views.LEAVE TYPES')
                  </a>
              <h4 class="fw-semibold mb-8">@lang('views.LEAVE REQUESTS')</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route("front.home") }}">@lang('views.DASHBOARD')</a></li>
                  <li class="breadcrumb-item" aria-current="page">@lang('views.LEAVE REQUESTS')</li>
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
                    <th>@lang('views.LEAVE DATE')</th>
                    <th>@lang('views.EMPLOYEE')</th>
                    <th>@lang('views.FROM')</th>
                    <th>@lang('views.TO')</th>
                    <th>@lang('views.STATUS')</th>
                    <th>@lang('views.TYPE')</th>
                    <th>@lang('views.ACTION')</th>
              </tr></thead>
              <tbody>
                <!-- start row -->
                @foreach ($data as $leave)
                <tr class="search-items" style="">
                    <td>{{ $leave->leave_date }}</td>



                   <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset( $leave->user->image ) }}" alt="avatar" class="rounded-circle" width="35">
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$leave->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $leave->user->name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>

                 <td>
                                        {{ $leave->from }}
                                       </td>
                                       <td>
                                        {{ $leave->to }}
                                       </td>
                                       <td>
                                        <span @class(['badge','bg-success'=>$leave->getTranslation('status','en')=='approve',
                                            'bg-danger'=>$leave->getTranslation('status','en')=='rejected',
                                            'bg-info'=>$leave->getTranslation('status','en')=='waiting',
                                            ])>
                                       {{ $leave->status }}</span>
                                       </td>

                                       <td>
                                       {{ $leave->ltype->name }}
                                    </td>
                  <td>
                    <div class="action-btn">
                      <a href="{{ route('front.leaves.show',$leave->id) }}" class="text-info edit">
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
