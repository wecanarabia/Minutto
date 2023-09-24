<x-front-layouts.app>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <a href="{{ route("front.rewards.create") }}" class="btn btn-info float-end mx-2">
                        <i class="ti ti-calendar-plus text-white me-1 fs-5"></i>@lang('views.ADD ALLOWANCE')
                      </a>
                      <a href="{{ route("front.reward-types.index") }}" class="btn btn-info float-end">
                        <i class="ti ti-device-desktop-cog text-white me-1 fs-5"></i> @lang('views.ALLOWANCE TYPES')
                      </a>
                    <h4 class="fw-semibold mb-8">@lang('views.ALLOWANCE')</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted"
                                    href="{{ route('front.home') }}">@lang('views.DASHBOARD')</a></li>
                            <li class="breadcrumb-item" aria-current="page">@lang('views.ALLOWANCE')</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>

        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-12">
                    <x-front-layouts.messages />

                    <!-- ---------------------
                            start Scroll - Horizontal
                        ---------------- -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">@lang('views.ALLOWANCE')</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_hor"
                                class="table border table-striped table-bordered display nowrap"
                                style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>@lang('views.ALLOWANCE DATE')</th>
                                        <th>@lang('views.EMPLOYEE')</th>
                                        <th>@lang('views.TYPE')</th>
                                        <th>@lang('views.TYPES VALUE')</th>
                                        <th>@lang('views.STATUS')</th>
                                        <th>@lang('views.ACTIONS')</th>

                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($data as $reward)

                                    <tr>
                                        <td>{{ $reward->reward_date }}</td>
                                        <td>
                    <div class="d-flex align-items-center">
                        @if ($reward->user->image==null)

                        <img src="{{ asset('assets\images\lg\avatar13.png') }}" alt="{{ $reward->user->name . ' ' . $reward->user->last_name }}" width="35"
                            class="rounded-circle">
                        @else
                      <img src="{{ asset( $reward->user->image ) }}" alt="{{ $reward->user->name . ' ' . $reward->user->last_name }}" class="rounded-circle" width="35">
                        @endif
                      <div class="ms-3">
                        <div class="user-meta-info">
                            <a href="{{ route('front.employees.show',$reward->user->id) }}">
                          <h6 class="user-name mb-0" data-name="Emma Adams">{{ $reward->user->name . ' ' . $reward->user->last_name }}</h6></a>
                        </div>
                      </div>
                    </div>
                  </td>
                   <td>
                    {{ $reward->rtype->name }}
                    </td>

                   <td>
                    {{ $reward->reward_value }}
                   </td>

                   <td>
                    <span @class(['badge','bg-success'=>$reward->getTranslation('status','en')=='approve',
                        'bg-danger'=>$reward->getTranslation('status','en')=='rejected',
                        'bg-info'=>$reward->getTranslation('status','en')=='waiting',
                        ])>
                   {{ $reward->status }}</span>
                   </td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="{{ route('front.rewards.show',$reward->id) }}" class="text-info edit">
                                                  <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="{{ route('front.rewards.edit',$reward->id) }}" class="text-primary edit">
                                                  <i class="ti ti-edit fs-5"></i>
                                                </a>
                                              </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                    <!-- start row -->


                            </table>
            </div>
        </div>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------
                            end Scroll - Horizontal
                        ---------------- -->
                </div>
            </div>
        </div>
        <!-- ---------------------
                        end Contact
                    ---------------- -->


    </div>


</x-front-layouts.app>
